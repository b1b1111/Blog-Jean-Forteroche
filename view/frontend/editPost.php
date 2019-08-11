<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu(); 
?>

<?php require('html.php'); ?>
<?php require('template.php'); ?>

<h2><a href="<?= $_POST['URL_PATH'] ?>chapitres">Retour à la liste des billets</a></h2>

<h2 class="adminH2">Modifier chapitres</h2>
    <p class="adminParagraphe"><em>Modification des chapitres.</em></p>

    <form id="modif_articles" method="post" action="administration/editPost/<?= $post['id'] ?>">

        <label for="title">Titre du chapitre</label><br />
        <input type="text" class="title" name="title" value="<?= $post['title'] ?>" /><br /><br />
        
        <label for="content">Contenu du chapitre</label><br />
        <textarea id="full-feat" name="content" contenteditable="true"><?= $post['content'] ?></textarea><br />

        <input type="submit" class="btn_valid" value="Modifier chapitre" onclick="ModifPost()">
        
  </form>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>
<?php require('footer.php'); ?>