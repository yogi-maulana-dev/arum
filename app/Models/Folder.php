<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Folder extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'parent_id',
        'name',
        'color',
        'description',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'color', 'parent_id'])->logOnlyDirty();
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

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    // ── Helpers ────────────────────────────────────────────────
    public function breadcrumb(): array
    {
        $crumbs = [];
        $folder = $this;
        while ($folder) {
            array_unshift($crumbs, ['id' => $folder->id, 'name' => $folder->name]);
            $folder = $folder->parent;
        }
        return $crumbs;
    }

    public function totalSize(): int
    {
        $direct = $this->files()->withTrashed(false)->sum('size');
        $sub = $this->children->sum(fn($c) => $c->totalSize());
        return $direct + $sub;
    }

    public function fileCount(): int
    {
        return $this->files()->count() + $this->children->sum(fn($c) => $c->fileCount());
    }
}
