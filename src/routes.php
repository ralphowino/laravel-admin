<?php

\Route::group(['middleware' => 'web'],
    function ($router) {
        \Route::get('theme/{path?}', 'Ralphowino\LaravelAdmin\LaravelAdminController@showPage')
            ->where('path', '(.*)');
    });