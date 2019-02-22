<?php

namespace MoanaGR\Blog\Model;

require_once("model/Manager.php");
require_once('model/Post.php');

class PostManager extends Manager
{

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM billets ORDER BY date_post DESC LIMIT 0,5');
        $posts = array();
        foreach ($req as $post){
          $post = new \MoanaGR\Blog\Model\Post($post['id'],$post['pseudo'],$post['titre'],$post['contenu'],$post['date_post']);
          array_push($posts, $post);
        }
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        $post = new \MoanaGR\Blog\Model\Post($post['id'],$post['pseudo'],$post['titre'],$post['contenu'],$post['date_post']);

        return $post;
    }
    public function newPost($pseudo, $titre, $content)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("INSERT INTO billets(pseudo, titre, contenu) VALUES ('$pseudo','$titre',$content)");
      $affectedLines = $req->exectute($pseudo, $titre, $content);
      return $affectedLines;
    }

}
?>
