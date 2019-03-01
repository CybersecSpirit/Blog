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
    public function newPost($billet)
    {
      $db = $this->dbConnect();
      $pseudo = $billet['pseudo'];
      $titre = $billet['titre'];
      $content = $billet['content'];
      $affectedLines = $db->query("INSERT INTO billets(pseudo, titre, contenu) VALUES ('$pseudo','$titre',$content)");
      return $affectedLines;
    }

    public function postEdit($id){
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT * FROM billets WHERE id = ?');
      $req->execute(array($id));
      $post = $req->fetch();
      $post = new \MoanaGR\Blog\Model\Post($post['id'],$post['pseudo'],$post['titre'],$post['contenu'],$post['date_post']);
      return $post;
    }
    public function postUpdate($id){
      $db = $this->dbConnect();
      $title = $_POST['title'];
      $content = $_POST['content'];
      $update = $db->query("UPDATE billets SET titre = '$title', contenu = '$content' WHERE id = $id ");
      return $affectedLines;
    }
    public function deletePost($id)
    {
      $db = $this->dbConnect();
      $post = $db->query("DELETE FROM billets WHERE id = $id ");
      return $post;
    }

}
?>
