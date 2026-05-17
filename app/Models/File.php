<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class File extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'folder_id',
        'original_name',
        'stored_name',
        'disk',
        'path',
        'size',
        'mime_type',
        'extension',
        'is_encrypted',
        'encryption_key',
        'is_starred',
        'virus_status',
        'checksum',
        'description',
        'download_count',
    ];

    protected $casts = [
        'is_encrypted' => 'boolean',
        'is_starred'   => 'boolean',
        'size'         => 'integer',
        'download_count' => 'integer',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['original_name', 'folder_id', 'is_starred'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // ── Relations ──────────────────────────────────────────────
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    public function shares(): HasMany
    {
        return $this->hasMany(FileShare::class);
    }

    // ── Helpers ────────────────────────────────────────────────
    public function sizeFormatted(): string
    {
        $bytes = $this->size;
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        while ($bytes >= 1024 && $i < 3) { $bytes /= 1024; $i++; }
        return round($bytes, 1) . ' ' . $units[$i];
    }

    public function iconColor(): string
    {
        return match ($this->extension) {
            'pdf'                       => 'red',
            'doc', 'docx'              => 'blue',
            'xls', 'xlsx'              => 'green',
            'ppt', 'pptx'              => 'orange',
            'jpg', 'jpeg', 'png', 'gif', 'webp' => 'purple',
            'zip', 'rar', '7z'         => 'yellow',
            'mp4', 'mov', 'avi'        => 'pink',
            default                    => 'gray',
        };
    }

    public function url(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

    public function exists(): bool
    {
        return Storage::disk($this->disk)->exists($this->path);
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }

    public function isPreviewable(): bool
    {
        return in_array($this->extension, ['pdf', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'txt', 'svg']);
    }

    public function scopeForTenant($query, string $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }

    public function scopeInFolder($query, ?int $folderId)
    {
        return $query->where('folder_id', $folderId);
    }

    public function scopeStarred($query)
    {
        return $query->where('is_starred', true);
    }
}
