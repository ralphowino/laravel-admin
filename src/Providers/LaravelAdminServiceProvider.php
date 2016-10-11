<?php

namespace Ralphowino\LaravelAdmin\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/' => base_path('config/'),
            __DIR__ . '/../Themes/' => base_path('resources/themes/'),
            __DIR__ . '/../Assets/' => base_path('public/'),
        ]);

        $this->registerThemes();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\FloatingPoint\Stylist\StylistServiceProvider::class);

        include __DIR__ . '/../Routes/routes.php';
        $this->app->make('Ralphowino\LaravelAdmin\Controllers\LaravelAdminController');
    }


    private function registerThemes()
    {
        $path = config('laraveladmin.theme_path', resource_path('themes'));
        $available_themes = config('laraveladmin.themes', []);

        $themes = \Cache::remember('available_themes', 5, function () use ($available_themes) {
            return $available_themes;
        });

        foreach ($themes as $theme) {
            $theme_path = str_replace('//', '/', $path . '/' . $theme);
            \Stylist::registerPath($theme_path);
        }
    }

}
