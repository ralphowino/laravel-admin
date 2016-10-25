<?php
/**
 * Created by PhpStorm.
 * User: Stv
 * Date: 10/25/2016
 * Time: 6:28 PM
 */

namespace Ralphowino\LaravelAdmin\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class MigrationGenerator extends Command
{


    protected $name = 'resource:migration';


    protected $description = 'Generates migration';


    public function handle(){
        $table = Str::plural(Str::snake(class_basename($this->argument('name'))));
        $this->call('make:migration', ['name' => "create_{$table}_table", '--create' => $table]);
    }

    protected function getArguments()
    {
        return [
            ['name', null, InputArgument::REQUIRED, 'Name of model to generate migration for']
        ];
    }
}