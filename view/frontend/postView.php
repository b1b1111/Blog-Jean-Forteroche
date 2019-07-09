<?php $title = 'Jean Forteroche'; ?>

<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>


<h2><a href="<?= $_POST['URL_PATH'] ?>chapitres">Retour à la liste des billets</a></h2>

<div class="news">
    <h3>
        <?php echo html_entity_decode($post['title']) ?>  
    </h3>
    
    <p>
        <?php echo html_entity_decode($post['content']) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form id="form_com" method="post" action="createComment">

  <input type="text" placeholder="Nom" id="author" name="author"/><br />

  <textarea id="full-test" placeholder="Message" name="content" contenteditable="true"></textarea><br />
  
  <button class="admin_approuve">Commentaire</button>

</form>

<?php
while ($comment = $comments->fetch())
{
    if ($comment['approuve'] == 1) {
   
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
<?php
    }
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
