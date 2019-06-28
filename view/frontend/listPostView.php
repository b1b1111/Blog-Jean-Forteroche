<?php $title = 'Jean Forteroche'; ?>

<?php 
require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>
<div id="title_articles">
    <h1>Articles</h1>

    Fusce auctor eros at nisl tempus, quis fermentum augue posuere. Etiam ornare id lacus in sodales. Morbi sagittis tincidunt mauris ac bibendum. <br /> 
    Vestibulum sit amet mauris congue, aliquam ligula ut, euismod lorem. Proin rutrum dapibus felis at varius. Donec imperdiet dictum tincidunt. Quisque pretium auctor tincidunt. Sed consequat ante nibh,a hendrerit orci sodales id.</p>
</div>

<?php
while ($post = $posts->fetch()) {
?>
    <div class="news">
        <h3>
            <?= (html_entity_decode($post['title'])) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
   
        <div id="chapters_part">

        <?php

            $db = new \PDO('mysql:host=localhost;dbname=jean forteroche;charset=utf8', 'root', '');
            $sql = 'SELECT * FROM posts';
            $request = $db->prepare($sql);
            $request->execute();

            while($row=$request->fetch(PDO::FETCH_OBJ)) {

                //récupère un extrait de content.
                $resum = substr($row->content, 0,140);
                //trouve dernier espace après dernier mot de l'extrait.
                $space = strrpos($resum, ' ');
                
                echo substr($resum, 0, $space).'...';
            }
        ?>
            <br /><br />
            <a id="lirePlus" href="?controller=PostController?action=post&amp;id=<?= $data['id'] ?>">lire plus</a>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
