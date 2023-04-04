<?php


namespace App\Core;

abstract class  AbstractGetUrl 
{
    

    public function getUrlGet()
    {
        $method =strtolower( $_SERVER["REQUEST_METHOD"]);

        
        if($method==='get'){
            // url d"étecte

            $path =  $this->setPath();

           return $path;
        }
    }

   

    public function setPath()
    {
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

   



    
}