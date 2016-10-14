<?php

namespace Ralphowino\LaravelAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class LaravelAdminServiceProvider extends ServiceProvider
{
    private $package_name = 'laraveladmin';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
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

        $path = __DIR__ . '/Themes';

        $available_themes = config('laraveladmin.themes');

        $themes = \Cache::remember('available_themes', 0, function () use ($available_themes) {
            return $available_themes;
        });

        foreach ($themes as $theme) {
            $theme_path = str_replace('//', '/', $path . '/' . $theme);
            \Stylist::registerPath($theme_path);
        }

        $this->switchTheme();

        $theme = \Session::get('current_theme', config('laraveladmin.default_theme'));

        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        }
    }


    private function switchTheme()
    {

        $request = Request::capture();
        if ($request->has('switchTheme')) {
            $theme = $request->switchTheme;
        } else {
            return;
        }

        $theme_path = str_replace("//", "/", config('laraveladmin.theme_path', resource_path('themes')) . '/' . $theme);

        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        } elseif (file_exists($theme_path . '/theme.json')) {
            \Stylist::registerPath($theme_path, true);
            \Cache::forget('available_themes');
        } else {
            throw new \Exception('Theme ' . $theme . ' does not exist');
        }

        $theme = \Stylist::current();
        \Session::put('current_theme', $theme->getName());
    }

}
