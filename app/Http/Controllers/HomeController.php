<?php

namespace App\Http\Controllers;

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
        $theme = \Session::get('theme');
        return view('home');
    }

    public function switchTheme($theme)
    {
        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        } elseif (file_exists(resource_path('themes/' . $theme . '/theme.json'))) {
            \Stylist::registerPath(resource_path('themes/' . $theme), true);
        } else {
            throw new \Exception('Theme ' . $theme . ' does not exist');
        }

        \Session::put('theme', $theme);
        return redirect('home');
    }
}
