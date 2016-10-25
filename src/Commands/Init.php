<?php
/**
 * Created by PhpStorm.
 * User: Stv
 * Date: 10/25/2016
 * Time: 11:10 AM
 */

namespace Ralphowino\LaravelAdmin\Commands;

use Symfony\Component\Console\Input\InputOption;

class Init extends Generator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'resource:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets application namespace for future generations';

    /**
     * Execute the console command.
     *
     * @return mixed
     */


    protected $type = 'Controller';

    protected $path = '';


    public function fire()
    {
        parent::fire();
        $this->info('BaseController successfully created in ' . $this->path);
    }

    protected function getOptions()
    {
        return [
            ['namespace', null, InputOption::VALUE_OPTIONAL, 'Namespace where the base controller will be published to.']
        ];
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.base.stub';
    }


    protected function getDefaultNamespace($rootNamespace)
    {
        if ($n = $this->option('namespace')) {
            $this->path = $rootNamespace . "\\Http\\Controllers\\" . $n;
        } else {
            $this->path = $rootNamespace . '\\Http\\Controllers\\Base';
        }

        $this->setBaseControllerPath();

        return $this->path;
    }

    protected function getNameInput()
    {
        return 'BaseController';
    }

    protected function getArguments()
    {
        return [];
    }

    protected function setBaseControllerPath()
    {
        $path = str_replace("\\\\", "\\", $this->path . "\\" . $this->getNameInput());
        file_put_contents(__DIR__ . '/../Config/.config', 'BASE_CONTROLLER=' . $path);
    }
}