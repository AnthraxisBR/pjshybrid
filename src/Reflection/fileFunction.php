<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/28/2018
 * Time: 11:30 PM
 */

namespace AnthraxisBR\App\Reflection;

class fileFunction
{

    public static function find($fileContent)
    {
        error_reporting(E_ALL ^ E_NOTICE);

        $arr = token_get_all($fileContent);

        $functions = array();

        foreach($arr as $key => $value){

            if($value[0] == 334){
                $chekid = $value[2];
            }

            if($value[2] == $chekid && $value[0] == 307 && $value[2] != $old){
                $functions[] = $value[1];
                $old = $chekid;
            }
        }

        return $functions;
    }

}