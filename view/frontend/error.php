<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>

<div id="errorPage" >

    <div class="board">
        <p id="error">error</p>
        <p id="code">404</p>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('html.php'); ?>
<?php require('footer.php'); ?>
