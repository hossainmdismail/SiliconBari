<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GlobalSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_tagline',
        'company_short_description',
        'logo_path',
        'favicon_path',

        'contact_email',
        'contact_phone',
        'whatsapp_number',
        'address',
        'map_url',
        'map_embed_code',

        'facebook_url',
        'linkedin_url',
        'twitter_url',
        'youtube_url',
        'instagram_url',

        'footer_text',
        'copyright_text',

        'default_meta_title',
        'default_meta_description',
        'default_og_title',
        'default_og_description',
        'default_og_image_path',
        'canonical_base_url',
        'default_robots_meta',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo_path ? Storage::url($this->logo_path) : null;
    }

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon_path ? Storage::url($this->favicon_path) : null;
    }

    public function getDefaultOgImageUrlAttribute(): ?string
    {
        return $this->default_og_image_path ? Storage::url($this->default_og_image_path) : null;
    }
}
