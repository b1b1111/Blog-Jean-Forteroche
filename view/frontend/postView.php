<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>


<h2 id="link_chapter" ><a href="<?= $_POST['URL_PATH'] ?>chapitres">Retour à la liste des chapitres</a></h2>

<div class="news">
    <h3>
        <?php echo html_entity_decode($post['title']) ?>
    </h3>

    <p>
        <?php echo html_entity_decode($post['content']) ?>
    </p>
</div>

<h2 id="title_comment">Commentaires</h2>

<form id="form_com" method="post" action="<?= $post['id'] ?>/createComment">

    <label for="author">Votre nom/pseudo</label><br />
    <input type="text" id="author" name="author"/><br /><br />

    <label for="content">Message</label><br />
    <textarea id="full-test" name="content" contenteditable="true"></textarea><br />

    <button class="btn_valid">Editer commentaires</button>
    
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p class="comment_paragraphe" ><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p class="comment_paragraphe" ><?= nl2br(htmlspecialchars($comment['content'])) ?>
    <a class="admin_signal" href="<?= $_POST['URL_PATH'] ?>administration/alert/<?= $comment['id'] ?>">Signaler commentaire</a></p>

<?php 
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
