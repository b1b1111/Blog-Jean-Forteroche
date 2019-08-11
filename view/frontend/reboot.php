<?php 
$title = 'Jean Forteroche';
require('header.php'); 
$menu = view_menu();
require('html.php');
require('template.php');
?> 
<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>
<div id="recuperationMdp">
    <h2>Bonjour <?php echo $_SESSION['pseudo']; ?></h2>
    <p class='paragraphe'>Vous ne vous souvenez plus de votre mot de passe ? Cliquez sur le lien ci-dessous pour en créer un nouveau.</p>
    <?php
    if(isset($_SESSION['id']) == $_SESSION['id']) {
    ?>
    <br />
    <a href="<?= $_POST['URL_PATH'] ?>profil/editMP">Création d'un nouveau mot de passe</a>

    <?php
    }
    ?>
</div>

<?php require('footer.php'); ?>