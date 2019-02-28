<?php $titre = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
<a href='indexAdmin.php?action=moderate'> Moderation des commentaires </a>


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
            <a href="indexAdmin.php?action=editPost&amp;id=<?= $billet->getId() ?>">Modifier</a>
        </p>
    </div>

<?php
}
?>
<form action="" method=post>

</form>
<?php
$posts->closeCursor();
?>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
