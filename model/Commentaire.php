<?php

namespace MoanaGR\Blog\Model;

class Commentaire {
  private $_post;
  private $_contenu;
  private $_time;
  private $_auteur;

  public function __construct($post, $content, $time, $author)
    {
      $this->setPost($post);
      $this->setContent($content);
      $this->setTime($time);
      $this->setauthor($author);
    }

  public function setPost($post)
    {
      $this->_post = $post;
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
  public function getPost(){
    return $this->_post;
  }
  public function getContent(){
    return $this->_contenu;
  }
  public function getTime(){
    return $this->_time;
  }
  public function getAuthor(){
    return $this->_auteur;
  }
}
 ?>
