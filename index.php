<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
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
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
