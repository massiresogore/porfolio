<?php

namespace App\Controller;

class ViewController
{
    public function render($view, $params = [])
    {
        //on a besoin du layout 
        $layout = $this->layout();


        //On a besoin du contenue
        $viewContent = $this->renderViewOnly($view, $params);

        return  str_replace("{{content}}", $viewContent, $layout);
    }

    public function renderViewOnly($view, $params = [])
    {
        if (is_numeric($view)) {
            http_response_code($view);
            ob_start();

            require_once dirname(__DIR__) . "/public/template/pages/$view.php";
            return ob_get_clean();
        }

        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once dirname(__DIR__) . "/public/template/pages/$view.php";
        return ob_get_clean();
    }

    public function layout()
    {
        ob_start();
        include dirname(__DIR__) . "/public/template/default.php";
        return ob_get_clean();
    }

    public function notFound(int $code)
    {
    }
}
