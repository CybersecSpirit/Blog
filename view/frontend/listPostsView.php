<?php $titre = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['titre']) ?>
            <em>le <?= $data['date_post'] ?> par </em><?= htmlspecialchars($data['pseudo']) ?>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['contenu'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>