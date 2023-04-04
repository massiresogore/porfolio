<?php

namespace App\Model;

use App\Core\Db;
use App\Model\MessageModel;

class ContactStorage extends MessageModel
{
    public function createContact(array $data):bool
    {
        $contact = new MessageModel;
        $contact->setName($data['name']);
        $contact->setEmail($data['email']);
        $contact->setTextarea($data['textMessage']);
        $email = $contact->getEmail();
        $name = $contact->getName();
        $textMessage = $contact->getTextMessage();

        $query = Db::getInstance()->prepare("INSERT INTO `contact`(`id`,`name`, `email`,`textMessage`) VALUES (null,:name,:email,:textMessage)");
    
        $query->bindValue(':name', $name);
        $query->bindValue(':email', $email);
        $query->bindValue(':textMessage', $textMessage);
        $stm = $query->execute();
       return $stm;
    }
}