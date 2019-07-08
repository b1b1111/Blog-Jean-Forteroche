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
    while ($data = $posts->fetch()) {
?>
    <div class="news">
        <h3>
            <?= (html_entity_decode($data['title'])) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
   
        <div id="chapters_part">

        <?php
            if (strlen(strip_tags($data['content'])) >= 180) {
                //trouve dernier espace après dernier mot de l'extrait.
                $space = strpos(strip_tags($data['content']), ' ', 180);               
                echo substr(strip_tags($data['content']), 0, $space).'...';
            }

            else 
                echo(strip_tags($data['content']));
                
        ?>
            <br /><br />
            <a id="lirePlus" href="<?php $_POST['URL_PATH'] ?>chapitres/<?= $data['id'] ?>">lire plus</a>
        </div>
    </div>

<?php
    }
    $posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
