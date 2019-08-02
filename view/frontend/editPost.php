<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu(); 
?>

<?php ob_start(); ?>

<h2><a href="<?= $_POST['URL_PATH'] ?>chapitres">Retour à la liste des billets</a></h2>

<h2 class="adminH2">Modifier chapitres</h2>
    <p class="adminParagraphe"><em>Modification des chapitres.</em></p>

    <form id="modif_articles" method="post" action="administration/editPost/<?= $post['id'] ?>">

        <label for="title">Titre du chapitre</label><br />
        <input type="text" class="title" name="title" value="<?= $post['title'] ?>" /><br /><br />
        
        <label for="content">Contenu du chapitre</label><br />
        <textarea id="full-feat" name="content" contenteditable="true"><?= $post['content'] ?></textarea><br />
        
        <button class="btn_valid">modifier chapitre</button><br /><br />
  </form>

<?php $content = ob_get_clean(); ?>
<?php require('html.php'); ?>
<?php require('footer.php'); ?>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>