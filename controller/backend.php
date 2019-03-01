<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

use MoanaGR\Blog\Model\PostManager;

function listPosts()
{
    $postManager = new \MoanaGR\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}

function viewModerateComs()
{
  $commentManager = new \MoanaGR\Blog\Model\CommentManager();
  $modeCom = $commentManager->getCommentMod();
  require('view/backend/moderatePost.php');
}
function deleteComs($id)
{
  $commentManager = new \MoanaGR\Blog\Model\CommentManager();
  $modeCom = $commentManager->deleteComment($id);
  header('Location: indexAdmin.php?action=moderate');
}
function deletePost($id)
{
  $postManager = new \MoanaGR\Blog\Model\PostManager();
  $modePost = $postManager->deletePost($id);
  header('Location: indexAdmin.php?action=moderate');
}
function editPost($id){
  $postManager = new \MoanaGR\Blog\Model\PostManager();
  $post = $postManager->postEdit($id);
  require('view/backend/postEdit.php');
}
function postUpdate($id){
  $postManager = new \MoanaGR\Blog\Model\PostManager();
  $post = $postManager->postUpdate($id);
  header('Location: indexAdmin.php');
}
function connectUser(){
  $author = $_POST['author'];
  $password = $_POST['password'];
  $userManager = new \MoanaGR\Blog\Model\UserManager();
  $login = $userManager->connectUser($author, $password);
  $nameSession = $login->getName();
  session_start();
  $_SESSION['name'] = $nameSession;
  listPosts();

}
