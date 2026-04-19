<?php

namespace App\Support;

use App\Models\GlobalSetting;
use App\Models\SeoPages;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Throwable;

class FrontendSeo
{
    public function resolve(?string $pageKey, array $fallback = []): array
    {
        $global = $this->globalSettings();
        $page = $this->seoPage($pageKey);

        $title = $page?->meta_title
            ?: $global?->default_meta_title
            ?: $fallback['title']
            ?: $global?->site_name
            ?: config('app.name', 'My Website');

        $description = $page?->meta_description
            ?: $global?->default_meta_description
            ?: $fallback['description']
            ?: $global?->company_short_description
            ?: config('app.name', 'My Website');

        $ogTitle = $page?->og_title
            ?: $global?->default_og_title
            ?: $fallback['og_title']
            ?: $title;

        $ogDescription = $page?->og_description
            ?: $global?->default_og_description
            ?: $fallback['og_description']
            ?: $description;

        $ogImage = $this->toAbsoluteUrl(
            $page?->og_image_url
            ?: $global?->default_og_image_url
            ?: $fallback['og_image']
            ?: null
        );

        $twitterTitle = $fallback['twitter_title'] ?: $ogTitle;
        $twitterDescription = $fallback['twitter_description'] ?: $ogDescription;
        $twitterImage = $this->toAbsoluteUrl($fallback['twitter_image'] ?: $ogImage);

        $canonical = $page?->canonical_url ?: $this->buildCanonicalUrl($global);

        $robots = $page
            ? implode(',', [
                $page->robots_index ? 'index' : 'noindex',
                $page->robots_follow ? 'follow' : 'nofollow',
            ])
            : ($global?->default_robots_meta ?: 'index,follow');

        return [
            'title' => $title,
            'description' => $description,
            'og_title' => $ogTitle,
            'og_description' => $ogDescription,
            'og_image' => $ogImage,
            'twitter_title' => $twitterTitle,
            'twitter_description' => $twitterDescription,
            'twitter_image' => $twitterImage,
            'canonical_url' => $canonical,
            'robots' => $robots,
            'schema_json' => $page?->schema_json,
            'favicon_url' => $this->toAbsoluteUrl($global?->favicon_url),
            'site_name' => $global?->site_name ?: config('app.name', 'My Website'),
        ];
    }

    protected function globalSettings(): ?GlobalSetting
    {
        try {
            if (! Schema::hasTable('global_settings')) {
                return null;
            }

            return GlobalSetting::query()->first();
        } catch (Throwable) {
            return null;
        }
    }

    protected function seoPage(?string $pageKey): ?SeoPages
    {
        if (blank($pageKey)) {
            return null;
        }

        try {
            if (! Schema::hasTable('seo_pages')) {
                return null;
            }

            return SeoPages::query()
                ->where('page_key', $pageKey)
                ->where('is_active', true)
                ->first();
        } catch (Throwable) {
            return null;
        }
    }

    protected function buildCanonicalUrl(?GlobalSetting $global): string
    {
        $baseUrl = rtrim($global?->canonical_base_url ?: config('app.url', url('/')), '/');
        $path = request()->path();

        if ($path === '/') {
            return $baseUrl;
        }

        return $baseUrl.'/'.ltrim($path, '/');
    }

    protected function toAbsoluteUrl(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        if (Str::startsWith($value, ['http://', 'https://', '//'])) {
            return $value;
        }

        return url($value);
    }
}
