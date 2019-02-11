<?php

namespace MoanaGR\Blog\Model;

class Post {
  private $_id;
  private $_titre;
  private $_contenu;
  private $_time;
  private $_auteur;

  public function __construct($id, $title, $content, $time, $author)
    {
      $this->setId($id);
      $this->setTitle($title);
      $this->setContent($content);
      $this->setTime($time);
      $this->setauthor($author);
    }

  public function setId($id)
      {
        $this->_tid = $id;
      }
  public function setTitle($title)
    {
      $this->_titre = $title;
    }
  public function setContent($content)
    {
      $this->_contenu = $content;
    }
  public function setTime($time)
    {
      $this->_time = $time;
    }
  public function setAuthor($author)
    {
      $this->_auteur = $author;
    }

}

 ?>
