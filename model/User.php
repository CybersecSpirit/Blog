<?php

namespace MoanaGR\Blog\Model;

class User {
  private $_id;
  private $_name;
  private $_password;

  public function __construct($id, $name, $password){
    $this->setId($id);
    $this->setName($name);
    $this->setPassword($password);
  }

  public function setId($id)
    {
      $this->_id = $id;
    }
  public function setName($name)
      {
        $this->_name = $name;
      }
  public function setPassword($password)
        {
          $this->_password = $password;
        }
}
