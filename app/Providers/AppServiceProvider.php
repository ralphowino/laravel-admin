<?php

namespace App\Providers;

use FloatingPoint\Stylist\Theme\Stylist;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->registerDevPackages();
        $this->registerThemes();
    }

    private function registerThemes()
    {
        $themes = \Cache::remember('themes', function () {
            return ['sbadmin', 'metronic', 'bootstrap', 'bootswatch'];
        }, 1);
        foreach ($themes as $theme) {
            Stylist::register(resource_path('themes/' . $theme));
        }
    }

    private function registerDevPackages()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
