<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_NAME = 'porfolio';
    private const DB_HOST = '127.0.0.1';
    private static $instance;


    public function __construct()
    {
        $dsn = 'mysql:dbname='.self::DB_NAME.';host='.self::DB_HOST;

        try{
            
            parent::__construct($dsn, self::DB_USER,self::DB_PASSWORD);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die($e->getMessage()."Pas de connexion");
        }
    }

    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}