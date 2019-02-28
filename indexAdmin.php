<?php
require('controller/backend.php');

try {
  if (isset($_GET['action'])) {
      if ($_GET['action'] == 'listPosts') {
          listPosts();
      } else if ($_GET['action'] == "supprimer"){
        if (isset($_GET['id']) && $_GET['id'] > 0){
          editPost();
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
      }
    } else {
      listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
