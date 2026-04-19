<?php

namespace App\Providers;

use App\Support\FrontendMarketing;
use App\Support\FrontendSeo;
use Illuminate\Support\ServiceProvider;

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
        //
    }
}
