<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Faq;
use App\Models\Insight;
use App\Models\Industry;
use App\Models\Service;
use App\Models\Team;
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
        $brands = Brand::query()->where('is_active', true)->ordered()->get();
        $teams = Team::query()->where('is_active', true)->ordered()->get();
        $testimonials = Testimonial::query()->where('is_active', true)->ordered()->get();
        $faqs = Faq::query()->where('is_active', true)->ordered()->get();

        return view('pages.about', [
            'brands' => $brands,
            'teams' => $teams,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
        ]);
    }

    public function services(): View
    {
        $services = Service::query()
            ->where('is_active', true)
            ->ordered()
            ->get();

        return view('pages.services', [
            'services' => $services,
        ]);
    }

    public function industries(): View
    {
        $industries = Industry::query()
            ->where('is_active', true)
            ->ordered()
            ->get();

        return view('pages.industries', [
            'industries' => $industries,
        ]);
    }

    public function technology(): View
    {
        $industries = Industry::query()
            ->where('is_active', true)
            ->ordered()
            ->get();

        return view('pages.technology', [
            'industries' => $industries,
        ]);
    }

    public function insights(): View
    {
        $insights = Insight::query()
            ->where('is_active', true)
            ->ordered()
            ->get();

        return view('pages.insights', [
            'insights' => $insights,
        ]);
    }

    public function casestudy(): View
    {
        return view('pages.casestudy');
    }

    public function contact(): View
    {
        $faqs = Faq::query()->where('is_active', true)->ordered()->get();
        $services = Service::query()->where('is_active', true)->ordered()->get();

        return view('pages.contact', [
            'faqs' => $faqs,
            'services' => $services,
        ]);
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
