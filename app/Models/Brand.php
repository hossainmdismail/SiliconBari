<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    protected $fillable = [
        'brand_image',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Brand $brand): void {
            if (filled($brand->sort_order)) {
                return;
            }

            $brand->sort_order = (static::query()->max('sort_order') ?? 0) + 1;
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function getBrandImageUrlAttribute(): ?string
    {
        return $this->brand_image ? Storage::url($this->brand_image) : null;
    }
}
