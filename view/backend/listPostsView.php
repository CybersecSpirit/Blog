<?php session_start();?>
<?php $titre = 'Mon blog'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
        <link href="../public/css/style.css" rel="stylesheet" />
    </head>

    <body>
<a href='index.php?action=deconnect'>Deconnexion</a></br>
<a href='index.php?action=blog'> Retour Au Blog </a>
<h1>Administration !</h1>
<p>Derniers billets du blog :</p>
<a href='index.php?action=moderate'> Moderation des commentaires </a>


<?php
foreach ($posts as $billet)
{
?>
    <div class="news">
        <h3>
            <?= $billet->getTitle() ?>
            <em>le <?= $billet->getTime() ?> par </em><?= $billet->getAuthor() ?>
        </h3>

        <p>
            <?= $billet->getContent() ?>
            <br />
            <a href="index.php?action=editPost&amp;id=<?= $billet->getId() ?>">Modifier</a>
            <a href="index.php?action=supprimer&amp;id=<?=$billet->getId() ?>">Supprimer</a>
        </p>
    </div>

<?php
}
?>
<form action="" method=post>

</form>
<?php

?>
</body>
</html>
