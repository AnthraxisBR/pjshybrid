<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/28/2018
 * Time: 11:56 PM
 */

namespace AnthraxisBR\App;

class Compiler
{

    public $compiled = '';

    public function run()
    {
        foreach ($GLOBALS['pjshybrid']->lines as $line)
        {
            $this->compiled .= $line;
        }

        foreach ($GLOBALS['pjshybrid']->registeredFunction as $registeredFunction => $args)
        {
            $snippet = '
                function ' . $registeredFunction . '( ' . implode(',',$args) . '){
                    Main.ajaxPost({
                        
                    }):
                }
            ';
            $this->compiled .= $line;
        }
    }

}