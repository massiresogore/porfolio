<?php

namespace App\Form;

use App\Core\Model;

class Field
{
    public Model $model;
    public string $attribut;
    public const TYPE_TEXT = "text";
    public const TYPE_EMAIL = "email";
    public  string $type = self::TYPE_TEXT;
    const TEXT_EMAIL = 'Votre Email';
    const TEXT_NAME = 'Nom & prénom';
    const TEXT_MESSAGE = 'Votre message';
    public string $placeholder = self::TEXT_MESSAGE;
    private string $textMessage = "textMessage";


    public function __construct($attribut, $model)
    {
        $this->model = $model;
        $this->attribut = $attribut;
    }

    public function __toString()
    {
        return sprintf(
            '
                <input type="%s" name="%s" class="%s" placeholder="%s" value="%s"  >
            ',
            // $this->attribut,
            // $this->attribut,
            $this->type,
            $this->attribut,
            $this->model->hasError($this->attribut) ? 'is-invalid' : '',
            $this->placeholder,
            $this->model->{$this->attribut}

        );
    }

    public function typeText()
    {
        $this->type = self::TYPE_TEXT;
        return $this;
    }

    public function typeEmail()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function plaholderName()
    {
        $this->placeholder = self::TEXT_NAME;
        return $this;
    }

    public function placeholderEmail()
    {
        $this->placeholder = self::TEXT_EMAIL;
        return $this;
    }


    public function typeTextarea()
    {
        return sprintf(
            '
                <textarea name="%s" class="%s" placeholder="%s" >%s</textarea>
            ',
            $this->textMessage,
            $this->model->hasError($this->textMessage) ? 'is-invalid' : '',
            $this->placeholder,
            $this->model->{$this->textMessage}
        );
    }

    public function getTextArea()
    {
        echo $this->typeTextarea();
    }
}
