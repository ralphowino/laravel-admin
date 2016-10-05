const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
        .copy('node_modules/font-awesome/fonts', 'public/fonts')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts')
        .copy('resources/assets/img', 'public/img')
        .webpack('app.js');

    //SB-Admin Assets
    require('./resources/assets/themes/sbadmin')(mix);

    //adminLTE Assets
    require('./resources/assets/themes/adminLTE')(mix);

    //Gentelella Assets
    require('./resources/assets/themes/gentelella')(mix);

    //Metronic Assets
    require('./resources/assets/themes/metronic')(mix);
});