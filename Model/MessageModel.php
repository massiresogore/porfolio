<?php

namespace App\Model;

use App\Core\Model;

class MessageModel extends Model
{
    public string $name = "";
    public string $email = "";
    public string $textMessage = "";


    public function rules()
    {
        return [
            "name" => [self::RULE_REQUIRE],
            "email" => [self::RULE_REQUIRE, [self::RULE_EMAIL, "email"]],
            "textMessage" => [self::RULE_REQUIRE, [self::RULE_MIN, "min" => 5], [self::RULE_MAX, "max" => 1000]]
        ];
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setTextarea($textMessage)
    {
        $this->textMessage = $textMessage;
        return $this;
    }

    public function getTextMessage()
    {
        return $this->textMessage;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
