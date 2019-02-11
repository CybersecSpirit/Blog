<?php
namespace MoanaGR\Blog\Model;

require_once("model/Manager.php");
require_once("model/Commentaire.php");

class CommentManager extends Manager
{
    public function getComments($idBillet)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id_billet, pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($idBillet));
        $commentaires = array();
        foreach ($comments as $commentaire){
          $commentaire = new \MoanaGR\Blog\Model\Commentaire($commentaire['id_billet'], $commentaire['commentaire'], $commentaire['date_commentaire'], $commentaire['pseudo']);
          array_push($commentaires, $commentaire);
        }

        return $commentaires;
    }

    public function postComment($idBillet, $pseudo, $commentaire)
    {
        $db = $this->dbConnect();
        $time =time();
        echo $time;
        $comments = $db->prepare("INSERT INTO commentaires(id_billet, pseudo, commentaire, date_commentaire, moderate) VALUES('$idBillet', '$pseudo', '$commentaire', '$time', 0)");
        $affectedLines = $comments->execute(array($idBillet, $pseudo, $commentaire));
        return $affectedLines;
    }

}
?>
