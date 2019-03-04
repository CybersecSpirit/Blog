<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon Blog</title>
        <link href="../public/css/style.css" rel="stylesheet" />
    </head>

</header>
  <a href='index.php?action=login'> Administration </a>
</header>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


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
            <em><a href="index.php?action=post&amp;id=<?= $billet->getId() ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
</body>
</html>
