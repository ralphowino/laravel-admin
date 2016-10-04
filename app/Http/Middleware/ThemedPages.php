<?php

namespace App\Http\Middleware;

use Closure;

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
        $theme = \Session::get('theme', 'sbadmin');
        \Stylist::activate($theme);
        return $next($request);
    }
}
