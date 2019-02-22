<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

use MoanaGR\Blog\Model\PostManager;

function listPosts()
{
    $postManager = new \MoanaGR\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \MoanaGR\Blog\Model\PostManager();
    $commentManager = new \MoanaGR\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($idBillet, $pseudo, $commentaire)
{
    $commentManager = new \MoanaGR\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($idBillet, $pseudo, $commentaire);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $idBillet);
    }
}
function signalerComment($id, $idPost)
{
    $commentManager = new \MoanaGR\Blog\Model\CommentManager();
    $affectedLines = $commentManager->signalComment($id);

    if ($affectedLines === false) {
        throw new Exception('Impossible de signaler le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $idPost);
    }
}
