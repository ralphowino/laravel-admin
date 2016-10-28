<?php
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Created by PhpStorm.
 * User: Stv
 * Date: 10/28/2016
 * Time: 3:26 PM
 */
class ResourceGenerator extends Command
{

    protected $name = 'admin:resource';

    protected $description = 'Generates a complete resource including Model, Controller, Migration, Views and Routes';


    protected function getArguments()
    {
        return [
            ['name', null, InputArgument::REQUIRED, 'Name of the resource to generate.']
        ];
    }

    protected function getOptions()
    {
        return [
            ['only', null, InputOption::VALUE_OPTIONAL, 'Resources to generate: Controller, Model, Migration, Views or Routes'],
            ['except', null, InputOption::VALUE_OPTIONAL, 'Resources not to generate: Controller, Model, Migration, Views or Routes'],
            ['fields', null, InputOption::VALUE_OPTIONAL, 'Resource Model Fields'],
            ['views', null, InputOption::VALUE_OPTIONAL, 'Views to generate: index,create,edit, show'],
        ];
    }
}