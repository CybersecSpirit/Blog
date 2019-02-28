<?php $titre = 'Moderation'; ?>

<?php ob_start(); ?>
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
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
