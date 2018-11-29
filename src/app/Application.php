<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/28/2018
 * Time: 10:51 PM
 */

namespace AnthraxisBR\App;

global $pjshybrid;

class Application
{

    private $compiler;

    public function __construct()
    {
        $this->build();


    }

    public function registerFileFunctions($file = null)
    {
        if(is_null($file))
        {
            throw new Exception('Informe um arquivo válido para registrar',0004);
        }

        try{

            $file = file_get_contents($file);

            $GLOBALS['pjshybrid']->makeFunctionHybrid($file);

        }catch (\Exception $e)
        {
            throw new Exception('Não foi possível registrar ou localizar esse arquivo',0005);

        }

    }


    public function build()
    {
        $this->compiler = new AnthraxisBR\App\Compiler();

        $this->builResources();

        $this->builDatabase();

    }

    public function builResources()
    {
        if (getenv('RESOURCES') === 'ALL')
        {

            $GLOBALS['pjshybrid'] = new AnthraxisBR\App\Hybridizer();

        }
    }

    public function builDatabase()
    {

        if(getenv('DATABASE') === true)
        {
            $this->conn = AnthraxisBR\Database\Connect();

            global $pjshybrid_conn;
            $pjshybrid_conn = $this->conn->getConn();
        }

    }
}