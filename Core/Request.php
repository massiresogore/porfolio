<?php

namespace App\Core;

class Request
{
    public function method()
    {
        return $method = strTolower($_SERVER['REQUEST_METHOD']);
    }

    public function getpath()
    {
        //On recupère le chemin (URL)
        $path = $_SERVER['REQUEST_URI'] ?? "/";
       
        //On définit la limite
        $limit = "?";

        //On charche la position de limit par dans l'URL
        $position = strpos($path, $limit);
        //on récupère le path
        if($position){
            $path = substr($path, 0, $position);
        }
        
       return $path;
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }
    
    public function isGet()
    {
        return $this->method() === 'post';
    }

    public function getData()
    {
        $data = [];

        if($this->isPost())
        {
            foreach ($_POST as $key => $value) {
                $data[$key] = strip_tags($value);
            }
        }
        
        if($this->isGet())
        {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET,$value, FILTER_SANITIZE_SPECIAL_CHARS);
            }   
        }
        
        return $data;
    }

}