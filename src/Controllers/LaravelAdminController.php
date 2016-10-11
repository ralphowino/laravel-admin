<?php

namespace Ralphowino\LaravelAdmin\Controllers;

use Illuminate\Routing\Controller;

class LaravelAdminController extends Controller
{
    public function switchTheme($theme)
    {
        //dd($theme);
        $theme_path = str_replace("//", "/", config('laraveladmin.theme_path', resource_path('themes')) . '/' . $theme);
        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        } elseif (file_exists($theme_path. '/theme.json')) {
            \Stylist::registerPath($theme_path, true);
            \Cache::forget('available_themes');
        } else {
            throw new \Exception('Theme ' . $theme . ' does not exist');
        }

        $theme = \Stylist::current();

        $meta = json_decode(file_get_contents($theme->getPath() . '/theme.json'), true);
        dd(array_get($meta, 'routes.default', 'home'));
        \Session::put('current_theme', $theme->getName());
        return redirect(array_get($meta, 'routes.default', 'home'));
    }


    public function showPage($path)
    {
        $path = str_replace('/', '.', $path);
        if (\View::exists($path)) {
            return response()->view($path);
        }
        abort(404);
    }

}
