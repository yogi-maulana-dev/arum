<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class FileShare extends Model
{
    protected $fillable = [
        'file_id',
        'shared_by',
        'shared_with',
        'shared_email',
        'token',
        'permission',
        'is_public',
        'password',
        'download_limit',
        'download_count',
        'expires_at',
    ];

    protected $casts = [
        'is_public'      => 'boolean',
        'expires_at'     => 'datetime',
        'download_limit' => 'integer',
        'download_count' => 'integer',
    ];

    protected $hidden = ['password'];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($share) {
            if (empty($share->token)) {
                $share->token = Str::random(48);
            }
        });
    }

    // ── Relations ──────────────────────────────────────────────
    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function sharedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shared_by');
    }

    public function sharedWith(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shared_with');
    }

    // ── Helpers ────────────────────────────────────────────────
    public function isExpired(): bool
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    public function isDownloadLimitReached(): bool
    {
        return $this->download_limit && $this->download_count >= $this->download_limit;
    }

    public function isAccessible(): bool
    {
        return !$this->isExpired() && !$this->isDownloadLimitReached();
    }

    public function publicUrl(): string
    {
        return route('share.public', $this->token);
    }
}
