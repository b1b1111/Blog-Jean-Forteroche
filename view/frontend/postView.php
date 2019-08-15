<?php
$title = 'Jean Forteroche';?>
<?php require('header.php'); 
$menu = view_menu(); 
require_once('model/postManager.php');
$postManager = new \Benjamin\Alaska\Model\postManager(); 
?>

<?php require('html.php'); ?>
<?php require('template.php'); ?>

<h2 id="link_chapter" ><a href="<?= $_POST['URL_PATH'] ?>chapitres">Retour à la liste des chapitres</a></h2>

<div class="news">
    <h3>
        <?php echo html_entity_decode($post['title']) ?>
    </h3>

    <div id="content_news"> 
        <p>
            <?php echo html_entity_decode($post['content']) ?>
        </p>
    </div>   
</div>

<h2 id="title_comment">Commentaires</h2>

<form id="form_com" method="post" action="<?= $post['id'] ?>/createComment">

    <label for="author"></label><br />
    <input type="text" id="author" name="author" value="<?php echo $_SESSION['pseudo']; ?>"><br /><br />

    <label for="content">Message</label><br />
    <textarea id="full-test" name="content" contenteditable="true"></textarea><br />

    <input type="submit" class="btn_valid" value="Editer commentaire" onclick="Message()" >
</form>


<?php

while ($comment = $comments->fetch()) { 
   $user = $postManager->getUsers($comment["user_id"]);
?>

    <p class="comment_paragraphe" ><strong><?= htmlspecialchars($user['pseudo']); ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p class="comment_paragraphe" ><?= nl2br(htmlspecialchars($comment['content'])) ?>
    <?php 

    if ($comment['user_id'] !== $_SESSION['id']) { ?>
        <a class="admin_signal" href="<?= $_POST['URL_PATH'] ?>administration/alert/<?= $comment['id'] ?>" onclick="Signal()">Signaler commentaire</a></p>
    <?php } 
   
}
?>

