<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'work_location_type',
        'employment_type',
        'location',
        'working_hour',
        'working_days',
        'experience_level',
        'key_qualifications',
        'responsibilities',
        'benefits',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'key_qualifications' => 'array',
            'responsibilities' => 'array',
            'benefits' => 'array',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Career $career): void {
            if (filled($career->sort_order)) {
                return;
            }

            $career->sort_order = (static::query()->max('sort_order') ?? 0) + 1;
        });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function submissions()
    {
        return $this->hasMany(CareerSubmission::class);
    }
}
