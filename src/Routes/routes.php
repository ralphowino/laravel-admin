<?php

Route::get('routes/switch/{theme}', 'Ralphowino\LaravelAdmin\Controllers\LaravelAdminController@switchTheme');
Route::get('routes/{path?}', 'Ralphowino\LaravelAdmin\Controllers\LaravelAdminController@showPage')
    ->where('path', '(.*)');