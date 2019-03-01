<?php session_start();?>
<?php $titre = 'Moderation'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
        <link href="../Blog/public/css/style.css" rel="stylesheet" />
    </head>

    <body>
<a href="indexAdmin.php?action=deconnect">Deconnexion</a>
<h1>Mon super blog !</h1>
<p>Commentaires à moderer :</p>
<a href='indexAdmin.php'>Retour Menu Administration </a>


<?php
foreach ($modeCom as $commentaire)
{
?>
    <div class="news">
        <h3>
            <em>le <?= $commentaire->getTime() ?> par </em><?= $commentaire->getAuthor() ?>
        </h3>

        <p>
            <?= $commentaire->getContent() ?>
            <br />
            <em><a href="indexAdmin.php?action=moderate&amp;id=<?= $commentaire->getIdCom() ?>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
</body>
</html>
