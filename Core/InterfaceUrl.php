<?php

namespace App\Core;

interface InterfaceUrl
{
    public function getUrlGet();
    public function redirect();
    public function render($view, $params = []);
   
}