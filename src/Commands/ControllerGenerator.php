<?php
/**
 * Created by PhpStorm.
 * User: Stv
 * Date: 10/25/2016
 * Time: 2:54 PM
 */

namespace Ralphowino\LaravelAdmin\Commands;


use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ControllerGenerator extends Generator
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'resource:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates controller';

    /**
     * Execute the console command.
     *
     * @return mixed
     */


    protected $type = 'Controller';


    protected $modelName = '';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.stub';
    }

    public function fire()
    {
        if ($this->option('plain')) {
            $this->call('make:controller', ['name' => $this->getNameInput()]);
        } else {
            parent::fire();
        }
    }


    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);
        $ns = trim($this->laravel->getNamespace(), "\\");
        $stub = str_replace('ResourceNamespace', $ns . "\\Data\\Models\\" . $this->modelName, $stub);
        $stub = str_replace('ResourceName', $this->modelName, $stub);
        return str_replace('BaseControllerName', $this->getBaseController(), $stub);
    }

    protected function getBaseController()
    {
        $base = explode('=', trim(file_get_contents(__DIR__ . '/../Config/.config')))[1];
        if (!$base) {
            return 'Controller';
        }

        return $base;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\\Http\\Controllers";
    }

    protected function getOptions()
    {
        return [
            ['plain', 'p', InputOption::VALUE_NONE, 'Plain or resourceful controller']
        ];
    }

    protected function getNameInput()
    {
        $name = parent::getNameInput();
        if (Str::endsWith($name, 'Controller')) {
            preg_match("/^(.*)Controller$/i", $name, $matches);
            $this->modelName = $matches[1];
            return $name;
        }

        $this->modelName = $name;
        return $name . "Controller";
    }
}