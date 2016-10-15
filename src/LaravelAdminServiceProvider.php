<?php

namespace Ralphowino\LaravelAdmin;

use App\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelAdminServiceProvider extends ServiceProvider
{
    private $package_name = 'laraveladmin';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router, Kernel $kernel)
    {
        $this->publishes([
            __DIR__ . '/Config/laraveladmin.php' => base_path('config/laraveladmin.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/Themes/' => base_path('resources/themes/'),
        ], 'themes');

        $this->publishes([
            __DIR__ . '/Assets/' => base_path('public/'),
        ], 'assets');

        $this->registerThemes();

        view()->composer('laraveladmin::header', function ($view) {
            $view->with(['available_themes' => \Stylist::themes()]);
        });

        $router->pushMiddlewareToGroup('web', ActivateThemeMiddleware::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register("\\FloatingPoint\\Stylist\\StylistServiceProvider");

        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }

        $this->mergeConfigFrom(__DIR__ . '/Config/laraveladmin.php', 'laraveladmin');

    }

    private function registerThemes()
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'laraveladmin');

        $path = config('laraveladmin.theme_path');

        $available_themes = config('laraveladmin.themes');

        $themes = \Cache::remember('available_themes', 0, function () use ($available_themes) {
            return $available_themes;
        });

        foreach ($themes as $theme) {
            $theme_path = str_replace('//', '/', $path . '/' . $theme);
            \Stylist::registerPath($theme_path);
        }
    }
}
