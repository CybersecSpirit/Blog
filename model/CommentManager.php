<?php
namespace MoanaGR\Blog\Model;

require_once("model/Manager.php");
require_once("model/Commentaire.php");

class CommentManager extends Manager
{
    public function getComments($idBillet)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($idBillet));
        $commentaires = array();
        foreach ($comments as $commentaire){
          $commentaire = new \MoanaGR\Blog\Model\Commentaire($commentaire['id'], $commentaire['id_billet'], $commentaire['commentaire'], $commentaire['date_commentaire'], $commentaire['pseudo'], $commentaire['moderate']);
          array_push($commentaires, $commentaire);
        }

        return $commentaires;
    }

    public function postComment($idBillet, $pseudo, $commentaire)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare("INSERT INTO commentaires(id_billet, pseudo, commentaire, moderate) VALUES('$idBillet', '$pseudo', '$commentaire', 0)");
        $affectedLines = $comments->execute(array($idBillet, $pseudo, $commentaire));
        return $affectedLines;
    }

    public function signalComment($id)
    {
      $db = $this->dbConnect();
      $comments = $db->prepare("UPDATE commentaires SET moderate = '1' WHERE id = ? ");
      $affectedLines = $comments->execute(array($id));
      return $affectedLines;
    }
    public function getCommentMod()
    {
      $db = $this->dbConnect();
      $comments = $db->prepare("SELECT * FROM commentaires WHERE moderate != '0'");
      foreach ($comments as $commentaire){
        $commentaire = new \MoanaGR\Blog\Model\Commentaire($commentaire['id'], $commentaire['id_billet'], $commentaire['commentaire'], $commentaire['date_commentaire'], $commentaire['pseudo'], $commentaire['moderate']);
        array_push($commentaires, $commentaire);
      }

      return $commentaires;
    }

}
?>
