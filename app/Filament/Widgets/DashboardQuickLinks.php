<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\GlobalSettings;
use App\Filament\Pages\MarketingSettings;
use App\Filament\Resources\Brands\BrandResource;
use App\Filament\Resources\Industries\IndustryResource;
use App\Filament\Resources\Insights\InsightResource;
use App\Filament\Resources\SeoPages\SeoPagesResource;
use App\Filament\Resources\Services\ServiceResource;
use App\Filament\Resources\Testimonials\TestimonialResource;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Widget;

class DashboardQuickLinks extends Widget
{
    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.dashboard-quick-links';

    protected function getViewData(): array
    {
        return [
            'contentLinks' => [
                [
                    'label' => 'Services',
                    'description' => 'Manage service pages and add new offerings.',
                    'icon' => Heroicon::OutlinedWrenchScrewdriver,
                    'manageUrl' => ServiceResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => ServiceResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Industries',
                    'description' => 'Update industry blocks and ordering.',
                    'icon' => Heroicon::OutlinedBuildingOffice2,
                    'manageUrl' => IndustryResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => IndustryResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Brands',
                    'description' => 'Upload brand logos shown across the site.',
                    'icon' => Heroicon::OutlinedSwatch,
                    'manageUrl' => BrandResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => BrandResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Testimonials',
                    'description' => 'Curate client feedback and social proof.',
                    'icon' => Heroicon::OutlinedChatBubbleLeftRight,
                    'manageUrl' => TestimonialResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => TestimonialResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Blogs / Insights',
                    'description' => 'Publish articles, updates, and featured insights.',
                    'icon' => Heroicon::OutlinedNewspaper,
                    'manageUrl' => InsightResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => InsightResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'SEO Pages',
                    'description' => 'Control page-specific metadata and social previews.',
                    'icon' => Heroicon::OutlinedDocumentMagnifyingGlass,
                    'manageUrl' => SeoPagesResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => SeoPagesResource::getUrl('create', panel: 'siliconadmin'),
                ],
            ],
            'settingsLinks' => [
                [
                    'label' => 'Global Settings',
                    'description' => 'Logo, footer, site info, and default SEO fallbacks.',
                    'icon' => Heroicon::OutlinedCog6Tooth,
                    'url' => GlobalSettings::getUrl(panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Marketing Settings',
                    'description' => 'Tracking pixels, verification codes, and script injections.',
                    'icon' => Heroicon::OutlinedLightBulb,
                    'url' => MarketingSettings::getUrl(panel: 'siliconadmin'),
                ],
            ],
        ];
    }
}
