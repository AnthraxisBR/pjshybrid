<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/28/2018
 * Time: 10:36 PM
 */

namespace AnthraxisBR\Database;

class Connect
{

    public $mysqli;

    public function __construct()
    {
        $this->mysqli = mysqli_connect(
            getenv('DB_HOST'),
            getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );

        $this->testConnection();
    }

    public function getConn()
    {
        return $this->mysqli;
    }

    public function testConnection()
    {
        if(!$this->mysqli)
        {
            throw new Exception('Não possível estabelecer uma conexão',0001);
        }
        return true;
    }

}