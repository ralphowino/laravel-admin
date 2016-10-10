<?php

namespace App\Http\Controllers;

use Stylist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function switchTheme($theme)
    {
        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        } elseif (file_exists(resource_path('themes/' . $theme . '/theme.json'))) {
            \Stylist::registerPath(resource_path('themes/' . $theme), true);
            \Cache::forget('available_themes');
        } else {
            throw new \Exception('Theme ' . $theme . ' does not exist');
        }

        $theme = Stylist::current();
        $meta = json_decode(file_get_contents($theme->getPath() . '/theme.json'), true);

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
