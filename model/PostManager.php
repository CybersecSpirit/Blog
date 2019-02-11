<?php

namespace MoanaGR\Blog\Model;

require_once("model/Manager.php");
require('model/Post.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, titre, contenu, DATE_FORMAT(date_post, "%d/%m/%Y à %Hh%iMin%ss") AS date_post FROM billets ORDER BY date_post DESC LIMIT 0,5');
        $posts = array();
        foreach ($req as $post){
          $post = new \MoanaGR\Blog\Model\Post($post['id'],$post['titre'],$post['contenu'],$post['date_post'],$post['pseudo']);
          array_push($posts, $post);
        }
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, titre, contenu, DATE_FORMAT(date_post, "%d/%m/%Y à %Hh%iMin%ss") AS date_post FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        $post = new \MoanaGR\Blog\Model\Post($post['id'],$post['titre'],$post['contenu'],$post['date_post'],$post['pseudo']);

        return $post;
    }

}
?>
