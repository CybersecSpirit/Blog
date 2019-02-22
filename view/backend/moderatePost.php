<?php $titre = 'Moderation'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Commentaires à moderer :</p>


<?php
foreach ($modeCom as $commentaire)
{
?>
    <div class="news">
        <h3>
            <em>le <?= $commentaire->getTime() ?> par </em><?= $billet->getAuthor() ?>
        </h3>

        <p>
            <?= $commentaire->getContent() ?>
            <br />
            <em><a href="indexAdmin.php?action=supprimer&amp;id=<?= $commentaire->getIdCom() ?>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
