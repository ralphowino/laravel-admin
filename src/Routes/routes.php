<?php

Route::get('themes/switch/{theme}', 'Ralphowino\LaravelAdmin\Controllers\LaravelAdminController@switchTheme');
Route::get('themes/{path?}', 'Ralphowino\LaravelAdmin\Controllers\LaravelAdminController@showPage')
    ->where('path', '(.*)');