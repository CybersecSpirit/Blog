<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

use MoanaGR\Blog\Model\PostManager;

function listPosts()
{
    $postManager = new \MoanaGR\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}

function addPost($pseudo, $titre, $content)
{
  $postManager = new \MoanaGR\Blog\Model\PostManager();
  $post = $postManager->newPost($pseudo, $titre, $content);

  if ($affectedLines === false) {
      throw new Exception('Impossible de poster un nouveau billet !');
  }
  else {
      header('Location: index.php');
  }
}
function moderateComs($id)
{
  $commentManager = new \MoanaGR\Blog\Model\CommentManager();
  $modeCom = $commentManager->getCommentMod();
  require('view/backend/moderatePost.php');
}
/*function editPost($id){
  $postManager = new \MoanaGR\Blog\Model\PostManager();
  $post =
}*/
