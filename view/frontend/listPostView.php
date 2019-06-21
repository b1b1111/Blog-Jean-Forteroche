<?php $title = 'Jean Forteroche'; ?>

<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>
<div id="title_articles">
    <h1>Articles</h1>
    <p><em>Derniers articles du livre,</em><br /><br />

    Fusce auctor eros at nisl tempus, quis fermentum augue posuere. Etiam ornare id lacus in sodales. Morbi sagittis tincidunt mauris ac bibendum. <br /> 
    Vestibulum sit amet mauris congue, aliquam ligula ut, euismod lorem. Proin rutrum dapibus felis at varius. Donec imperdiet dictum tincidunt. Quisque pretium auctor tincidunt. Sed consequat ante nibh,a hendrerit orci sodales id.</p>
</div>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= $data['title'] ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
   
        <div id="resum">
            <?= nl2br($data['resum'])?>
            <br />
            <em><a href="chapters.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
