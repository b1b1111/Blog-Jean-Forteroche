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

<form id="edit_post" action="administration_post.php">
      <input type="button" value="G" style="font-weight:bold;" onclick="commande('bold');" />
      <input type="button" value="I" style="font-style:italic;" onclick="commande('italic');">
      <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline');">
      
      <label for="title">Titre</label> : <input type="varchar" name="title" id="title" /><br />
      <div id="editeur" contentEditable></div><br />

      <input type="button" name="submit" value="submit">
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>