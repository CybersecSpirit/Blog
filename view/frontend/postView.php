<?php $titre = htmlspecialchars($post->getTitle()); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
        <link href="../public/css/style.css" rel="stylesheet" />
    </head>
<body>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
        <em>le <?= $post->getTime() ?> par </em><?= $post->getAuthor() ?>
    </h3>

    <p>
        <?= $post->getContent() ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" method="post">
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
foreach ($comments as $commentaire)
{
?>  <div class="coms">
    <p><strong><?= htmlspecialchars($commentaire->getAuthor()) ?></strong> le <?= $commentaire->getTime() ?></p>
    <p><?= nl2br(htmlspecialchars($commentaire->getContent())) ?></p>
    <a href="index.php?action=signalComment&amp;id=<?=$commentaire->getIdCom()?>&amp;idPost=<?= $commentaire->getPost() ?>""">Signaler le commentaire</a></div>
<?php
}
?>
</body>
</html>
