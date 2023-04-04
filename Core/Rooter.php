<?php

namespace App\Core;



class Rooter 
{
    protected array $router;
    public Request $resquest;
  

    public function __construct()
    {
        $this->resquest = new Request;
       
    }
    
    public function get($path, $callBack)
    {
        $this->router['get'][$path] = $callBack;
    }

    public function post($path, $callBack)
    {
        $this->router['post'][$path] = $callBack;
    }

    public function resolve()
    {
       //Methode 
        $method = $this->resquest->method();
       
       //path
        $path = $this->resquest->getPath();
        
       //CallBack
       $callBack = $this->router[$method][$path] ?? false;

       //Si CallBack n'existe pas
       if($callBack == false){
        header('location: /');
        exit;
       
       }

       //Si CallBack est un tableau
       if(is_array($callBack)){
        $callBack[0] = new $callBack[0];
       }


        return call_user_func($callBack);
    }
}