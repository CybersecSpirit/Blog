<?php

namespace MoanaGR\Blog\Model;

require_once("model/Manager.php");
require_once('model/User.php');

class UserManager extends Manager
{
  public function connectUser($author, $password){
    $db = $this->dbConnect();
    $req = $db->query("SELECT * FROM users WHERE user = '$author' ");
    if ($req == true){
      foreach($req as $log){
        if ($password == $log['password']){
          $user = new \MoanaGR\Blog\Model\User($log['id'], $log['user'], $log['password']);
          return $user;
        } else {
          throw new Exception('Erreur lors de la connexion.');
        }
      }

    } else {
      throw new Exception('Erreur lors de la connexion.');
    }
  }
}
