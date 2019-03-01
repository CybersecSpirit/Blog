
<?php
require('controller/backend.php');

try {
  if (isset($_GET['action'])) {
    if (isset($_SESSION['name'])){
      if ($_GET['action'] == 'listPosts' ) {
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
        listPosts();
      }
    } else if ($_GET['action'] == 'authentification' ){
      if (isset($_SESSION['name'])){
        header('indexAdmin.php');
      } else {
        connectUser($_POST['author'],$_POST['password']);
        header('indexAdmin.php');
      }
    } else {
      listPosts();
    }
} else if (isset($_SESSION['name']))
{
  listPosts();
} else {
  header('Location: login.html');
}
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
