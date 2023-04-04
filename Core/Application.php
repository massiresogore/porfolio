<?php

namespace App\Core;

class Application
{
     public Rooter $router;

     public function __construct()
     {
          $this->router = new Rooter;
     }


     public function run()
     {
          echo $this->router->resolve();
     }
}
