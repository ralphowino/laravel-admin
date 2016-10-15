<?php
/**
 * Created by PhpStorm.
 * User: Stv
 * Date: 10/15/2016
 * Time: 2:43 PM
 */

namespace Ralphowino\LaravelAdmin;


use Closure;
use Illuminate\Http\Request;

class ActivateThemeMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->has('switchTheme')) {
            $theme = $request->switchTheme;
            $this->switchTheme($theme);
        }

        $theme = session('active_theme', config('laraveladmin.default_theme'));
        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        }


        return $next($request);
    }

    private function switchTheme($theme)
    {
        $theme_path = str_replace("//", "/", config('laraveladmin.theme_path', resource_path('themes')) . '/' . $theme);

        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        } elseif (file_exists($theme_path . '/theme.json')) {
            \Stylist::registerPath($theme_path, true);
            \Cache::forget('available_themes');
        } else {
            throw new \Exception('Theme ' . $theme . ' does not exist');
        }

        $theme = \Stylist::current()->getName();
        \Session::put('active_theme', $theme);
    }

}