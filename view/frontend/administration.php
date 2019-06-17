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

      <input type="button" value="G" style="font-weight:bold;" onclick="commande('bold');" >
	<input type="button" value="I" style="font-style:italic;" onclick="commande('italic');"/>
      <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline');"/>
      <select onchange="commande('heading', this.value); this.selectedIndex = 0;">
            <option value="">Titre</option>
            <option value="h1">Titre 1</option>
            <option value="h2">Titre 2</option>
            <option value="h3">Titre 3</option>
            <option value="h4">Titre 4</option>
            <option value="h5">Titre 5</option>
            <option value="h6">Titre 6</option>
      </select>

      <input type="text" placeholder="Message" name="content"/> <br />
      <div id="content" contentEditable ></div>

      <button>Save Articles</button>
     
</form>

<script>
$("form").submit(function(e)) {
    e.preventDefault();

    $.post(
          'administration_post.php',
          {
                title: $("#title").val(),
                content: $("#content").val(),
          };
          function(result) {
                if (result == "success success"){
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