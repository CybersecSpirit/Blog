<?php $titre = htmlspecialchars($post['titre']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['titre']) ?>
        <em>le <?= $post['date_post'] ?> par </em><?= htmlspecialchars($data['pseudo']) ?>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['contenu'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="pseudo">Auteur</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="commentaire">Commentaire</label><br />
        <textarea id="commentaire" name="commentaire"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($commentaire = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($commentaire['pseudo']) ?></strong> le <?= $commentaire['date_commentaire'] ?></p>
    <p><?= nl2br(htmlspecialchars($commentaire['commentaire'])) ?></p>
<?php
}
?>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
