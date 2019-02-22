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
      }
    } else {
      listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
