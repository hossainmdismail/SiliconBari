<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'category',
        'thumbnail',
        'banner',
        'overview',
        'key_features_description',
        'what_we_deliver',
        'our_process',
        'key_features',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'what_we_deliver' => 'array',
            'our_process' => 'array',
            'key_features' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Service $service): void {
            if (filled($service->sort_order)) {
                return;
            }

            $service->sort_order = (static::query()->max('sort_order') ?? 0) + 1;
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : null;
    }

    public function getBannerUrlAttribute(): ?string
    {
        return $this->banner ? Storage::url($this->banner) : null;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
