<?php

namespace App\Controller;

use App\Service\Container;

class SiteController extends Container
{

  public function home()
  {
    return $this->getViewController()->render("home/index");
  }

  public function contact()
  {
    if ($this->getRequest()->isPost()) {

      $this->getMessageModel()->load($this->getRequest()->getData());

      if ($this->getMessageModel()->isValid()) {
        if ($this->getContactStorage()->createContact($this->getRequest()->getData())) {
          $_SESSION['success'] = "ok";
          return header('location: .');
        };
      }


      return $this->getViewController()->render("contact/index", [
        "model" => $this->getMessageModel(),
        "form" => $this->getForm()
      ]);
    }

    return $this->getViewController()->render("contact/index", [
      "model" => $this->getMessageModel(),
      "form" => $this->getForm()
    ]);
  }

  public function resume()
  {
    return $this->getViewController()->render("resume/index");
  }
}