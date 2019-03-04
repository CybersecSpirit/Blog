<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
      if (isset($_SESSION['name'])){
        if ($_GET['action'] == 'listPosts' ) {
            listPostsAdmin();
        } else if ($_GET['action']=='blog'){
          listPosts();
        } else if ($_GET['action'] == "supprimer"){
          if (isset($_GET['id']) && $_GET['id'] > 0){
            deletePost($_GET['id']);
          }
        } else if ($_GET['action'] == "moderate") {
          if (isset($_GET['id']) && $_GET['id'] > 0){
            deleteComs($_GET['id']);
          }
          viewModerateComs();
        } else if ($_GET['action'] == "editPost"){
          if (isset($_GET['id']) && $_GET['id'] > 0){
            editPost($_GET['id']);
          }
        } else if ($_GET['action'] == "updatePost"){
          if (isset($_GET['id']) && $_GET['id'] > 0){
            postUpdate($_GET['id']);
          }
        }else if ($_GET['action'] == "deconnect"){
          $_SESSION = array();
          session_destroy();
          header('Location: index.php');
        } else {
          listPostsAdmin();
        }
      }
      if ($_GET['action'] == 'authentification'){
        if (isset($_SESSION['name'])){
          listPostsAdmin();
        } else{
          connectUser($_POST['author'],$_POST['password']);
          listPostsAdmin();
        }
      } else if ($_GET['action'] == 'login'){
        header('Location: login.html');
      }else if ($_GET['action'] == 'listPosts' && isset($_SESSION['name']) != true) {
            listPosts();
        }
        else if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['commentaire'])) {
                    addComment($_GET['id'], $_POST['pseudo'], $_POST['commentaire']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'signalComment') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
              signalerComment($_GET['id'], $_GET['idPost']);
            } else { throw new Exception ('Erreur Id Post');}
          } else {
            throw new Exception('Erreur lors du signalement, réessayez plus tard.');
          }
        }
    } else if (isset($_SESSION['name'])){
      listPostsAdmin();
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
