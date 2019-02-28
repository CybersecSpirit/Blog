<?php

namespace MoanaGR\Blog\Model;

class Post {
  private $_id;
  private $_titre;
  private $_contenu;
  private $_time;
  private $_auteur;

  public function __construct($id, $author, $title, $content, $time)
    {
      $this->setId($id);
      $this->setAuthor($author);
      $this->setTitle($title);
      $this->setContent($content);
      $this->setTime($time);
    }

  public function setId($id)
      {
        $this->_id = $id;
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
  public function getId()
  {
    return $this->_id;
  }
  public function getTitle()
  {
    return $this->_titre;
  }
  public function getContent()
  {
    return $this->_contenu;
  }
  public function getTime()
  {
    return $this->_time;
  }
  public function getAuthor()
  {
    return $this->_auteur;
  }
}

 ?>
