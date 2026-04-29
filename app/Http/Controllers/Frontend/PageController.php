<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Insight;
use App\Models\Industry;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class PageController extends Controller
{
    public function home(): View
    {
        $industries = Industry::query()->where('is_active', true)->ordered()->get();
        $services = Service::query()->where('is_active', true)->ordered()->limit(5)->get();
        $brands = Brand::query()->where('is_active', true)->ordered()->get();
        $testimonials = Testimonial::query()->where('is_active', true)->ordered()->get();
        $featuredInsights = Insight::query()
            ->where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->limit(2)
            ->get();

        return view('pages.home', [
            'industries' => $industries,
            'services' => $services,
            'brands' => $brands,
            'testimonials' => $testimonials,
            'featuredInsights' => $featuredInsights,
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function insights(): View
    {
        return view('pages.insights');
    }

    public function service(Service $service): View
    {
        abort_unless($service->is_active, 404);

        return view('pages.service-details', [
            'service' => $service,
            'whatWeDeliver' => $this->sortSectionItems($service->what_we_deliver),
            'ourProcess' => $this->sortSectionItems($service->our_process),
            'keyFeatures' => $this->sortSectionItems($service->key_features),
        ]);
    }

    public function insight(Insight $insight): View
    {
        abort_unless($insight->is_active, 404);

        return view('pages.insight-details', [
            'insight' => $insight,
        ]);
    }

    protected function sortSectionItems(?array $items): Collection
    {
        return collect($items ?? [])
            ->filter(fn($item): bool => filled($item['title'] ?? null))
            ->sortBy('sort_order')
            ->values();
    }
}
