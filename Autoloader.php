<?php

namespace App;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static public function autoload($class)
    {
        require_once __DIR__.str_replace(array(__NAMESPACE__."\\", "\\"),"/" , $class).".php";
    }
}