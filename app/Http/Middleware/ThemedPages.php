<?php

namespace App\Http\Middleware;

use Closure;
use Stylist;

class ThemedPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $theme = \Session::get('current_theme', 'SB Admin');
        if (\Stylist::has($theme)) {
            \Stylist::activate($theme);
        }

        return $next($request);
    }
}
