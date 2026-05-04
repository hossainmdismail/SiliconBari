<?php

namespace App\Providers;

use App\Models\GlobalSetting;
use App\Support\FrontendMarketing;
use App\Support\FrontendSeo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FrontendSeo::class, fn (): FrontendSeo => new FrontendSeo());
        $this->app->singleton(FrontendMarketing::class, fn (): FrontendMarketing => new FrontendMarketing());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('globalSettings', $this->resolveGlobalSettings());
        View::share('globalServices', $this->resolveGlobalServices());
    }

    protected function resolveGlobalServices()
    {
        try {
            if (!Schema::hasTable('services')) {
                return collect();
            }
            return \App\Models\Service::query()->where('is_active', true)->orderBy('sort_order')->get();
        } catch (\Throwable) {
            return collect();
        }
    }

    protected function resolveGlobalSettings(): ?GlobalSetting
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
}
