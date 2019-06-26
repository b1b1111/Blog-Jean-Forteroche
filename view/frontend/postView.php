<?php $title = htmlspecialchars($post['title']); ?>

<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>

<h2><a href="chapters.php">Retour à la liste des billets</a></h2>

<div class="news">
    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br($post['content']) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="chapters.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author"/> <br /><br />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input  class="form_btn" type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
