<?php
/**
 * Created by PhpStorm.
 * User: Stv
 * Date: 10/28/2016
 * Time: 11:23 AM
 */

namespace Ralphowino\LaravelAdmin\Commands;


use Illuminate\Support\Str;

class ViewGenerator extends Generator
{


    protected $name = 'resource:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Views for a resource';

    public function fire()
    {
        $modelName = Str::plural($this->getNameInput());
        $views = $this->getViews();

        foreach ($views as $view) {
            $location = $this->getTargetLocation($view);
            if (!$this->alreadyExists($location)) {
                $stub = file_get_contents($this->getStub() . '/' . $view . '.stub');
                $this->write($location, $this->replaceModelName($stub, $modelName));
                $this->info('View ' . $location . ' created successfully');
            } else {
                $this->info('SKIPPED ' . $modelName . '/' . $view . ': View already exists');
            }
        }
    }


    protected function getViews()
    {
        $views = [];
        $files = $this->files->allFiles($this->getStub());
        foreach ($files as $file) {
            array_push($views, str_replace('.'.$file->getExtension(), '', $file->getBaseName()));
        }

        return $views;
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/views';
    }


    protected function replaceModelName($stub, $modelName)
    {
        return str_replace('modelPlaceholder', $modelName, $stub);
    }


    protected function write($path, $content)
    {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        $this->files->put($path, $content);
    }

    protected function getTargetLocation($view)
    {
        $base = config('views.paths.0') ?: resource_path('views');
        return str_replace('//', '/', $base . '/' . Str::plural($this->getNameInput()) . '/' . $view . '.blade.php');
    }


    protected function alreadyExists($path)
    {
        return $this->files->exists($path);
    }

    protected function getNameInput()
    {
        return strtolower(trim($this->argument('name')));
    }
}