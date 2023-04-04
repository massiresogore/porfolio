<?php

namespace App\Service;

use App\Controller\ViewController;
use App\Core\Request;
use App\Form\Form;
use App\Model\MessageModel;
use App\Model\ContactStorage;

abstract class Container
{
    private ?Request $request = null;
    private ?Form $form = null;
    private ?MessageModel $messageModel = null;
    private ?ViewController $viewController = null;
    private ?ContactStorage $contactStorage = null;


    public function getMessageModel(): MessageModel
    {
        if ($this->messageModel === null) {
            $this->messageModel = new MessageModel;
        }

        return $this->messageModel;
    }
    public function getRequest(): Request
    {
        if ($this->request === null) {
            $this->request = new Request;
        }

        return $this->request;
    }
    public function getForm(): Form
    {
        if ($this->form === null) {
            $this->form = new Form;
        }

        return $this->form;
    }

    public function getViewController(): ViewController
    {
        if ($this->viewController === null) {
            $this->viewController = new ViewController;
        }

        return $this->viewController;
    }

    public function getContactStorage():ContactStorage
    {
        if($this->contactStorage === null){
            $this->contactStorage = new ContactStorage;
        }

        return $this->contactStorage;
    }
}