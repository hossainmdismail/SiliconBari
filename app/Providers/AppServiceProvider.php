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
