<?php

namespace App\Providers;

use Stylist;
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
        $this->registerThemes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->registerDevPackages();
    }

    private function registerThemes()
    {
        $themes = \Cache::remember('available_themes', 5, function () {
            return ['sbadmin', 'metronic', 'bootstrap', 'bootswatch','admin-lte','gentelella'];
        });
        foreach ($themes as $theme) {
            Stylist::registerPath(resource_path('themes/' . $theme));
        }
    }

    private function registerDevPackages()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
