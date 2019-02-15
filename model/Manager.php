<?php

namespace MoanaGR\Blog\Model;

class Manager
{
    public function dbConnect()
    {
      $db = new \PDO('mysql:host=localhost:8889;dbname=blog_cours_ocr;charset=utf8', 'root', 'root');
      return $db;

    }

}
