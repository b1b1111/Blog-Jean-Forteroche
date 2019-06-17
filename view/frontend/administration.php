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

<form method="post" action="view/frontend/administration_post.php">
      
      <input type="text" placeholder="Titre" name="title"/> <br />
      <input type="text" placeholder="Message" name="content"/> <br />

      <button>Save Articles</button>
     
</form>

<script>
$("form").submit(function(e)) {
    e.preventDefault();

    $.post(
          'view/frontend/administration_post.php',
          {
                title: $("#title").val(),
                content: $("#content").val(),
          };
          function(result) {
                if (result == "success"){
                      $("#result").html("success inserted values");
                }
                else {
                      $("#result").html("Error occured");
                }
          }
    );
});
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>