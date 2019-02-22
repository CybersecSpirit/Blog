<?php

namespace MoanaGR\Blog\Model;

class Commentaire {
  private $_idPost;
  private $_post;
  private $_contenu;
  private $_time;
  private $_auteur;
  private $_signal;

  public function __construct($idPost, $post, $content, $time, $author, $signal)
    {
      $this->setIdCom($idPost);
      $this->setPost($post);
      $this->setContent($content);
      $this->setTime($time);
      $this->setauthor($author);
      $this->setSignal($signal);
    }
  public function setIdCom($idPost)
    {
      $this->_idPost = $idPost;
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
  public function setSignal($signal)
    {
      $this->_signal = $signal;
    }
  public function getIdCom()
    {
      return $this->_idPost;
    }
  public function getPost()
    {
      return $this->_post;
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
  public function getSignal()
    {
      return $this->_signal;
    }
}
 ?>
