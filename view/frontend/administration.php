<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu(); 
?>

<?php ob_start(); ?>

  <ul id="list_comment">
        <h2 class="adminH2">Liste des commentaires</h2>
        <p class="adminParagraphe" ><em>Validez ou supprimer les commentaires.</em></p>

        <?php while($c = $comments->fetch()) { ?>

        <li><?= $c['id'] ?> : <?= $c['author'] ?> : <?= $c['content'] ?> <br />
        <?php if ($c['approuve'] == 0) { ?>
        <a class="admin_approuve" href="<?= $_POST['URL_PATH'] ?>administration/confirm/<?= $c['id'] ?>">Approuver</a>
        <?php } ?>
        <?php if ($c['alert'] == 1) { ?>
        <p class="admin_signal">Commentaire signalé !</p>
        <?php } ?>
        &nbsp;&nbsp;
        <a class="form_btn" href="<?= $_POST['URL_PATH'] ?>administration/deleteComment/<?= $c['id'] ?>">Supprimer</a></li><br />
        <?php } ?>
  </ul>

  <ul id="list_post">
        <h2 class="adminH2">Liste des articles</h2>
        <p class="adminParagraphe"><em>Modifiez, supprimer les articles.</em></p>

        <?php while($a = $posts->fetch()) { ?>

        <br /><li><?= $a['id'] ?> : <?= $a['title']?><br />
        <a class="admin_approuve" href="<?= $_POST['URL_PATH'] ?>administration/confirmPost/<?= $a['id'] ?>">Approuver</a>
        &nbsp;&nbsp;
        <a class="form_btn" href="<?= $_POST['URL_PATH'] ?>administration/deletePost/<?= $a['id'] ?>">Supprimer</a>
        &nbsp;&nbsp;
        <a class="admin_modif" href="<?= $_POST['URL_PATH'] ?>chapitres/modifPost/<?= $a['id'] ?>">Modification</a></li>
        <?php } ?>
  </ul>

    <h2 class="adminH2">Nouveaux chapitres</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des chapitres.</em></p>


  <form id="form_articles" method="post" action="administration/create">
        
        <input type="text" placeholder="Titre" id="title" name="title"/><br />

        <textarea id="full-featured" name="content" contenteditable="true"></textarea><br />
        
        <button class="admin_approuve">Editer articles</button><br /><br />
  </form>

    <h2 class="adminH2">Nouveaux commentaires</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des commentaires.</em></p>

  <form id="form_com" method="post" action="administration/createComment">

        <input type="text" placeholder="post_id" id="post_id" name="post_id"/><br />
        
        <input type="text" placeholder="nom" id="author" name="author"/><br />

        <textarea id="full-test" name="content" contenteditable="true"></textarea><br />
        
        <button class="admin_approuve">Editer commentaires</button><br />
  </form>

    <h2 class="adminH2">Modifier chapitres</h2>
    <p class="adminParagraphe"><em>Modification des chapitres.</em></p>

  <form method="POST" action="administration/editPostAdmin">
      <input type="text" name="article_titre" placeholder="Titre" value="<?= 
      $edit_article['title'] ?>" /><br />
      <textarea name="article_contenu" placeholder="Contenu de l'article"><?= 
      $edit_article['content'] ?></textarea><br />
      <input type="submit" value="Envoyer l'article" />
   </form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script>
  tinymce.init({
    selector: '#full-featured'
  });
</script>