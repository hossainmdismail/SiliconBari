<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable = [
        'comments',
        'client_name',
        'client_designation',
        'client_profile',
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
        static::creating(function (Testimonial $testimonial): void {
            if (filled($testimonial->sort_order)) {
                return;
            }

            $testimonial->sort_order = (static::query()->max('sort_order') ?? 0) + 1;
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function getClientProfileUrlAttribute(): ?string
    {
        return $this->client_profile ? Storage::url($this->client_profile) : null;
    }
}
