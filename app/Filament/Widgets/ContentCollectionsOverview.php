<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Brands\BrandResource;
use App\Filament\Resources\Industries\IndustryResource;
use App\Filament\Resources\Insights\InsightResource;
use App\Filament\Resources\SeoPages\SeoPagesResource;
use App\Filament\Resources\Services\ServiceResource;
use App\Filament\Resources\Testimonials\TestimonialResource;
use App\Models\Brand;
use App\Models\Industry;
use App\Models\Insight;
use App\Models\SeoPages;
use App\Models\Service;
use App\Models\Testimonial;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentCollectionsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    protected ?string $heading = 'Content Overview';

    protected ?string $description = 'A quick snapshot of every major content area so the client can understand what is live and where to manage it.';

    protected function getStats(): array
    {
        return [
            Stat::make('Industries', Industry::query()->count())
                ->description(Industry::query()->where('is_active', true)->count() . ' active')
                ->icon(Heroicon::OutlinedBuildingOffice2)
                ->color('info')
                ->url(IndustryResource::getUrl(panel: 'siliconadmin')),

            Stat::make('Services', Service::query()->count())
                ->description(Service::query()->where('is_active', true)->count() . ' active')
                ->icon(Heroicon::OutlinedWrenchScrewdriver)
                ->color('success')
                ->url(ServiceResource::getUrl(panel: 'siliconadmin')),

            Stat::make('Brands', Brand::query()->count())
                ->description(Brand::query()->where('is_active', true)->count() . ' active')
                ->icon(Heroicon::OutlinedSwatch)
                ->color('gray')
                ->url(BrandResource::getUrl(panel: 'siliconadmin')),

            Stat::make('Testimonials', Testimonial::query()->count())
                ->description(Testimonial::query()->where('is_active', true)->count() . ' active')
                ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                ->color('warning')
                ->url(TestimonialResource::getUrl(panel: 'siliconadmin')),

            Stat::make('Blogs / Insights', Insight::query()->count())
                ->description(Insight::query()->where('is_featured', true)->count() . ' featured')
                ->icon(Heroicon::OutlinedNewspaper)
                ->color('primary')
                ->url(InsightResource::getUrl(panel: 'siliconadmin')),

            Stat::make('SEO Pages', SeoPages::query()->count())
                ->description(SeoPages::query()->where('is_active', true)->count() . ' active')
                ->icon(Heroicon::OutlinedDocumentMagnifyingGlass)
                ->color('danger')
                ->url(SeoPagesResource::getUrl(panel: 'siliconadmin')),
        ];
    }
}
