<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeoPages extends Model
{
    protected $fillable = [
        'page_name',
        'page_key',
        'page_type',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'canonical_url',
        'robots_index',
        'robots_follow',
        'schema_json',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'robots_index' => 'boolean',
            'robots_follow' => 'boolean',
            'schema_json' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function getOgImageUrlAttribute(): ?string
    {
        return $this->og_image ? Storage::url($this->og_image) : null;
    }
}
