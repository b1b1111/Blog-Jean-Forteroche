<?php
$title = 'Jean Forteroche';
require('header.php');
$menu = view_menu(); 
require('html.php');
require('template.php');
?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p>

<p class="linkAdmin">
    <a href="<?= $_POST['URL_PATH'] ?>administration/adminComment" class="btn_valid" >Validez ou supprimer les commentaires</a>
</p>

<p class="linkAdmin">
    <a href="<?= $_POST['URL_PATH'] ?>administration/adminChapter" class="btn_valid" >Modifier ou supprimer les chapitres</a>
</p>

<h2 class="adminH2">Nouveaux chapitres</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des chapitres.</em></p>

  <form id="form_articles" method="post" action="administration/create">
        <label for="title">Titre du chapitre</label><br />
        <input type="text" class="title" name="title"/><br /><br />
        
        <label for="content">Contenu du chapitre</label>
        <textarea id="full-featured" name="content" contenteditable="true"></textarea><br />
        
        <button class="btn_valid" onclick="ConfirmChapt()">Editer chapitre</button><br /><br />
  </form>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>

<?php require('footer.php'); ?>

