<?php

namespace App\Services;

use App\Models\File;
use App\Models\User;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    public function __construct(
        private readonly VirusScanService $virusScan
    ) {}

    /**
     * Store an uploaded file, optionally encrypt it, and create the DB record.
     */
    public function store(
        UploadedFile $upload,
        User $user,
        ?int $folderId = null,
        bool $encrypt = false,
        string $disk = 'local'
    ): File {
        $original  = $upload->getClientOriginalName();
        $ext       = strtolower($upload->getClientOriginalExtension());
        $mime      = $upload->getMimeType();
        $size      = $upload->getSize();
        $stored    = Str::uuid() . '.' . $ext;
        $tenantDir = 'tenants/' . $user->tenant_id . '/files';

        $path = $upload->storeAs($tenantDir, $stored, $disk);

        // Virus scan (non-blocking; queue in production)
        $virusStatus = 'skipped';
        try {
            $virusStatus = $this->virusScan->scan(Storage::disk($disk)->path($path))
                ? 'clean'
                : 'infected';

            if ($virusStatus === 'infected') {
                Storage::disk($disk)->delete($path);
                throw new \RuntimeException('File terdeteksi mengandung virus dan telah dihapus.');
            }
        } catch (\RuntimeException $e) {
            throw $e;
        } catch (\Throwable) {
            $virusStatus = 'skipped';
        }

        // Encryption
        $encryptionKey = null;
        if ($encrypt) {
            [$path, $encryptionKey] = $this->encryptFile($disk, $path, $stored, $tenantDir);
        }

        // Checksum
        $checksum = hash_file('sha256', Storage::disk($disk)->path($path));

        return DB::transaction(function () use (
            $user, $folderId, $original, $stored, $disk, $path,
            $size, $mime, $ext, $encrypt, $encryptionKey,
            $virusStatus, $checksum
        ) {
            $file = File::create([
                'tenant_id'      => $user->tenant_id,
                'user_id'        => $user->id,
                'folder_id'      => $folderId,
                'original_name'  => $original,
                'stored_name'    => $stored,
                'disk'           => 'local',
                'path'           => $path,
                'size'           => $size,
                'mime_type'      => $mime,
                'extension'      => $ext,
                'is_encrypted'   => $encrypt,
                'encryption_key' => $encryptionKey,
                'virus_status'   => $virusStatus,
                'checksum'       => $checksum,
            ]);

            // Update user storage quota
            $user->increment('storage_used', $size);

            activity('file')
                ->performedOn($file)
                ->causedBy($user)
                ->withProperties(['size' => $size, 'folder_id' => $folderId])
                ->log('upload');

            return $file;
        });
    }

    /**
     * Return the decrypted contents ready for streaming.
     */
    public function getContents(File $file): string
    {
        $raw = Storage::disk($file->disk)->get($file->path);

        if (!$file->is_encrypted) {
            return $raw;
        }

        $key = Key::loadFromAsciiSafeString($file->encryption_key);
        return Crypto::decrypt($raw, $key);
    }

    /**
     * Permanently delete a file (hard delete from disk + DB).
     */
    public function destroy(File $file): void
    {
        DB::transaction(function () use ($file) {
            Storage::disk($file->disk)->delete($file->path);
            $file->user->decrement('storage_used', $file->size);
            activity('file')->performedOn($file)->causedBy(auth()->user())->log('hapus_permanen');
            $file->forceDelete();
        });
    }

    // ── Private helpers ────────────────────────────────────────

    private function encryptFile(string $disk, string $path, string $stored, string $dir): array
    {
        $key       = Key::createNewRandomKey();
        $raw       = Storage::disk($disk)->get($path);
        $encrypted = Crypto::encrypt($raw, $key);

        $encPath = $dir . '/' . $stored . '.enc';
        Storage::disk($disk)->put($encPath, $encrypted);
        Storage::disk($disk)->delete($path);

        return [$encPath, $key->saveToAsciiSafeString()];
    }
}
