<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CaseStudy extends Model
{
    protected $fillable = [
        'published_date',
        'title',
        'slug',
        'short_description',
        'thumbnail',
        'written_by',
        'industry',
        'category',
        'text_body',
        'features',
    ];

    protected function casts(): array
    {
        return [
            'published_date' => 'date',
            'features' => 'array',
        ];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderByDesc('published_date')->orderByDesc('id');
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class)
            ->withTimestamps()
            ->orderByPivot('sort_order');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : null;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
