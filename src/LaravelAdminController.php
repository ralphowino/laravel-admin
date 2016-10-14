<?php

namespace Ralphowino\LaravelAdmin;

use Illuminate\Routing\Controller;

class LaravelAdminController extends Controller
{
    private $package_name = 'laraveladmin';

    public function showPage($path)
    {
        $path = str_replace('/', '.', $path);
        if (\View::exists($path)) {
            return response()->view($path);
        }
        abort(404);
    }

}
