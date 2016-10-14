<?php

Route::get('theme/{path?}', 'Ralphowino\LaravelAdmin\LaravelAdminController@showPage')
    ->where('path', '(.*)');