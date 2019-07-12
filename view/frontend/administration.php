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
        <p class="adminParagraphe"><em>Supprimer ou modifier les articles.</em></p>

        <?php while($a = $posts->fetch()) { ?>

        <br /><li><?= $a['id'] ?> : <?= $a['title']?><br />
        <a class="form_btn" href="<?= $_POST['URL_PATH'] ?>administration/deletePost/<?= $a['id'] ?>">Supprimer</a>
        &nbsp;&nbsp;
        <a class="admin_modif" href="<?= $_POST['URL_PATH'] ?>administration/editPostAdmin/<?= $a['id'] ?>">Modification</a></li>
        <?php } ?>
  </ul>

    <h2 class="adminH2">Nouveaux chapitres</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des chapitres.</em></p>


  <form id="form_articles" method="post" action="administration/create">
        <label for="title">Titre du chapitre</label><br />
        <input type="text" id="title" name="title"/><br /><br />
        
        <label for="content">Contenu du chapitre</label>
        <textarea id="full-featured" name="content" contenteditable="true"></textarea><br />
        
        <button class="admin_approuve">Editer chapitre</button><br /><br />
  </form>

    <h2 class="adminH2">Nouveaux commentaires</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des commentaires.</em></p>

  <form id="form_com" method="post" action="administration/createComment">

        <label for="id">Numéro du chapitre</label><br />
        <input type="text" id="post_id" name="post_id"/><br /><br />

        <label for="author">Votre nom/pseudo</label><br />
        <input type="text" id="author" name="author"/><br /><br />

        <label for="content">Message</label><br />
        <textarea id="full-test" name="content" contenteditable="true"></textarea><br />
        
        <button class="admin_approuve">Editer commentaires</button><br />
  </form>

    <h2 class="adminH2">Modifier chapitres</h2>
    <p class="adminParagraphe"><em>Modification des chapitres.</em></p>

    <form id="modif_articles" method="post" action="administration/editPostAdmin">

        <label for="id">Id</label><br />
        <input type="text" id="idPost" name="idPost"><br /><br />

        <label for="title">Titre du chapitre</label><br />
        <input type="text" id="title" name="title"/><br /><br />
        
        <label for="content">Contenu du chapitre</label><br />
        <textarea id="full-feat" name="content" contenteditable="true"></textarea><br />
        
        <button class="admin_approuve">modifier chapitre</button><br /><br />
  </form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>