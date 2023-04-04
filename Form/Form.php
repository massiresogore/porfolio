<?php

namespace App\Form;

class Form
{
    public function formStart($action, $method, $novalidate = 'novalidate')
    {
        return sprintf(
            "<form action='%s' class='contact' id='contact' method='%s' %s>",
            $action,
            $method,
            $novalidate
        );
    }

    public  function formEnd()
    {
        echo "</form>";
    }

    public function field($attribut, $model)
    {
        return new Field($attribut, $model);
    }
}
