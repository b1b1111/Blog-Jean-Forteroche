<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu(); 
?>

<?php ob_start(); ?>

<?php 
if ((!isset($_POST{'password'}) OR $_POST['password'] != "Alaska44")&&(!isset($_POST{'email'}) OR $_POST['email'] != "forteroche.jean44@gmail.com")) {
?>
<h2 class="adminH2">Connexion administration</h2>

<form id="connexion" name="Verif" action="administration" method="post" onsubmit="return verifForm(this)" >
    <input type="email" name="email" required placeholder="e-mail" onblur="verifMail(this)"><br /><br />
    <input type="password" name="password" required placeholder="mot de passe" onblur="verifPassword(this)"><br /><br />
    <input id="btn_connexion" type="submit" name="submit" value="valider">
</form>
<?php
}
else {
?>
  <ul id="list_comment">
        <h2 class="adminH2">Liste des commentaires</h2>
        <p class="adminParagraphe" ><em>Validez ou supprimer les commentaires.</em></p>

        <?php while($c = $comments->fetch()) { ?>

        <li><?= $c['id'] ?> : <?= $c['author'] ?> : <?= $c['content'] ?> <br />
        <?php if ($c['approuve'] == 0) { ?>
        <a class="btn_valid" href="<?= $_POST['URL_PATH'] ?>administration/confirm/<?= $c['id'] ?>">Approuver</a>
        <?php } ?>
        <?php if ($c['alert'] == 1) { ?>
        <p class="admin_signal">Commentaire signalé !</p>
        <?php } ?>
        &nbsp;&nbsp;
        <a class="btn_suppr" href="<?= $_POST['URL_PATH'] ?>administration/deleteComment/<?= $c['id'] ?>">Supprimer</a></li><br />
        <?php } ?>
  </ul>

  <ul id="list_post">
        <h2 class="adminH2">Liste des chapitres</h2>
        <p class="adminParagraphe"><em>Supprimer ou modifier les chapitres.</em></p>

        <?php while($a = $posts->fetch()) { ?>

        <br /><li><?= $a['id'] ?> : <?= $a['title']?><br />
        <a class="btn_suppr" href="<?= $_POST['URL_PATH'] ?>administration/deletePost/<?= $a['id'] ?>">Supprimer</a>
        &nbsp;&nbsp;
        <a class="admin_modif" href="<?= $_POST['URL_PATH'] ?>administration/editPost/<?= $a['id'] ?>/prepare">Modification</a></li>
        <?php } ?>
  </ul>

    <h2 class="adminH2">Nouveaux chapitres</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des chapitres.</em></p>

  <form id="form_articles" method="post" action="administration/create">
        <label for="title">Titre du chapitre</label><br />
        <input type="text" class="title" name="title"/><br /><br />
        
        <label for="content">Contenu du chapitre</label>
        <textarea id="full-featured" name="content" contenteditable="true"></textarea><br />
        
        <button class="btn_valid">Editer chapitre</button><br /><br />
  </form>

<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('html.php'); ?>
<?php require('footer.php'); ?>

<script src="/public/js/verif.js"></script>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>