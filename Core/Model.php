<?php

namespace App\Core;

abstract class Model
{
    public const RULE_REQUIRE = "requis";
    public const RULE_EMAIL = "email";
    public const RULE_MIN = "min";
    public const RULE_MAX = "max";


    public array $error = [];

    abstract public function rules();


    public function load(array $data)
    {
        //Verification des proprietés
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function isValid()
    {
        foreach ($this->rules() as $attribut => $rules) {
            $value = $this->$attribut;


            foreach ($rules as $rule) {
                if (is_string($rule)) {
                    $rulename = $rule;
                }

                if (!is_string($rule)) {
                    $rulename = $rule[0];
                }

                if ($rulename === self::RULE_REQUIRE && !$value) {
                    $this->addErrors($attribut, self::RULE_REQUIRE);
                }
                if ($rulename === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrors($attribut, self::RULE_MIN, $rule);
                }
                if ($rulename === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrors($attribut, self::RULE_MAX, $rule);
                }
            }
        }

        return empty($this->error);
    }

    public function addErrors($attribut, $rule, $params = [])
    {

        // on cree le message
        $message = $this->errorMessage()[$rule];

        foreach ($params as $key => $value) {

            $message = str_replace("{{$key}}", $value, $message);
        }

        $this->error[$attribut][] = $message;
    }

    public function errorMessage()
    {
        return [
            self::RULE_REQUIRE => "Ce champ est obligatoire",
            self::RULE_EMAIL => "Votre email doit être valid ",
            self::RULE_MAX => "Valeur maximum est {max}",
            self::RULE_MIN => "Valeur minimum est {min}",

        ];
    }

    public function hasError($attribut)
    {
        return $this->error[$attribut] ?? false;
    }

    public function getError($attribut)
    {
        return $this->error[$attribut][0] ?? "";
    }


    public function getErrors()
    {
        return [
            $this->error["name"][0] ?? "",
            $this->error["email"][0] ?? "",
            $this->error["textMessage"][0] ?? "",
        ];
    }

    public function getAllErrors()
    {
        return  implode(' ', $this->getErrors());
    }
}
