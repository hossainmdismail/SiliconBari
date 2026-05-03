<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    protected $fillable = [
        'name',
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
        static::creating(function (Technology $technology): void {
            if (filled($technology->sort_order)) {
                return;
            }

            $technology->sort_order = (static::query()->max('sort_order') ?? 0) + 1;
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('technologies.sort_order')->orderBy('technologies.name');
    }

    public function caseStudies(): BelongsToMany
    {
        return $this->belongsToMany(CaseStudy::class)
            ->withTimestamps()
            ->orderByPivot('sort_order');
    }
}
