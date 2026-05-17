<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends BaseTenant
{
    protected $fillable = [
        'id',
        'company_name',
        'plan',
        'storage_limit',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
        'storage_limit' => 'integer',
    ];

    public static function getCustomColumns(): array
    {
        return ['id', 'company_name', 'plan', 'storage_limit'];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'tenant_id');
    }

    public function folders(): HasMany
    {
        return $this->hasMany(Folder::class, 'tenant_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'tenant_id');
    }

    public function storageLimitFormatted(): string
    {
        return $this->formatBytes($this->storage_limit);
    }

    public function storageUsed(): int
    {
        return $this->files()->withTrashed()->sum('size');
    }

    public function storageUsedFormatted(): string
    {
        return $this->formatBytes($this->storageUsed());
    }

    public function storagePercentage(): float
    {
        if ($this->storage_limit === 0) return 0;
        return round(($this->storageUsed() / $this->storage_limit) * 100, 1);
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($bytes >= 1024 && $i < 4) {
            $bytes /= 1024;
            $i++;
        }
        return round($bytes, 1) . ' ' . $units[$i];
    }
}
