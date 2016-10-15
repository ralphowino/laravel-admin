# Laravel Admin Theme Package

This package enables you to switch between different admin themes easily. It comes pre-packaged with three popular themes, but you are free to add or delete as you see fit.
 
## Installation
1. Run `composer require ralphowino/laraveladmin`
2. After the installation is complete, add `Ralphowino\LaravelAdmin\LaravelAdminServiceProvider` to `config/app.php` providers array.
3. Run `php artisan vendor publish --provider=Ralphowino\LaravelAdmin\LaravelAdminServiceProvider`. This this do three things:
  * Publish the configuration file in `config/laraveladmin.php`
  * Copy the prepackaged themes to `resources/themes`
  * Copy the themes js/css/images to `public`
  * NB: You can use the tags `config, themes or assets` to publish the individual assets respectively.
  

##Configuration
The config file has the folowing options:
 1. `theme_path` - path to the directory containing your themes, relative to the root the application. The default value is `resources/themes`. The value of this option is used when registering themes.
 2. `themes` -  an array of themes to load. The names used here should match a theme's directory in `theme_path`. Each theme registered here should at the least have a `theme.json` file and a `views` directory. Refer to the documentation of FloatingPoint\Stylist for more information.
 3. `default_theme` - default theme
  
  

## Usage
Once a theme has been activated, you can call `return view('view_name')` the usual way. View resolution will be done in the view directory of the active theme.
Blade directives will also work as usual.