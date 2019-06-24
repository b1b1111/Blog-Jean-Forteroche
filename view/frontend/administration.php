<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu(); 
?>
<?php require('model\admin.php'); ?>

<?php ob_start(); ?>

<ul id="list_comment">
      <h2>Liste des commentaires</h2>
      <p><em>Validez ou supprimer les commentaires.</em></p>
      <?php while($c = $comment->fetch()) { ?>
      <li><?= $c['id'] ?> : <?= $c['author'] ?> : <?= $c['comment'] ?><?php if($c['approuve'] == 0) { ?> - 
      <a href="administration?type=comments&approuve=<?= $c['id'] ?>">Approuver</a><?php } ?> - 
      <a href="administration?type=comments&supprime=<?= $c['id'] ?>">Supprimer</a></li>
      <?php } ?>
</ul>

<ul id="list_post">
      <h2>Liste des articles</h2>
      <p><em>Validez ou supprimer les articles.</em></p>
      <?php while($a = $posts->fetch()) { ?>
      <li><?= $a['id'] ?> : <?= $a['title'] ?> : <?= $a['content'] ?><?php if($a['approuve'] == 0) { ?> - 
      <a href="administration?type=posts&approuve=<?= $a['id'] ?>">Approuver</a><?php } ?> - 
      <a href="administration?type=posts&supprime=<?= $a['id'] ?>">Supprimer</a></li>
      <?php } ?>
</ul>

<form id="form_articles" method="post" action="view/frontend/administration_post.php">
      
      <input type="text" placeholder="Titre" id="title" name="title"/> <br />

      <textarea id="full-featured" name="content" contenteditable="true"></textarea><br />
      
      <button>Editer articles</button>
     
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script>
  tinymce.init({
    selector: '#full-featured, #resum_post'
  });
</script>