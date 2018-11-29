<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/28/2018
 * Time: 11:03 PM
 */

namespace AnthraxisBR\App;

use Mockery\Exception;
use AnthraxisBR\App\Reflection\fileFunction;

class Hybridizer
{

    /**
     * @var array
     */
    public $lines = [];

    public $registeredFunction = [];

    public function __construct()
    {

    }

    public function makeFunctionHybrid($file)
    {

        $functions = fileFunction::find($file);

        foreach ($functions as $function) {
            $this->registeredFunction[] = $function;
        }
    }

    public function script(string $script = null)
    {
        $this->lines[] = $script;
    }

    public function assign(string $id = null,string $element = null,string $content = null)
    {
        $this->validateAssign(func_get_args());

        $this->lines[] = 'document.getElementById("' . $id . '").innerHTML  = "<' . $element . '>' . $content . '</' . $element . '>";';
    }

    public function validateAssign($args)
    {
        array_map(function($arg){
            if(is_null($arg))
            {
                throw new Exception('Informe um valor para ' . key($arg),0002);
            }
        },$args);
        return true;
    }

    public function validateScript($script)
    {
        if(is_null($script))
        {
            throw new Exception('Informe um script ',0003);
        }
        return true;
    }
}