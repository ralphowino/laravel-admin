<?php namespace Ralphowino\LaravelAdmin;

class LaravelAdminController extends \Illuminate\Routing\Controller
{
    public function showPage($path)
    {
        $path = str_replace('/', '.', $path);
        if (\View::exists($path)) {
            return response()->view($path);
        }
        abort(404);
    }
}