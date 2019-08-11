<?php 
$title = 'Jean Forteroche';
require('header.php'); 
$menu = view_menu();
require('html.php');
require('template.php');
?>
<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>
<div align="center">
    <h2>Reinitialisation du mot de passe</h2>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">

            <label>Nouveau mot de passe :</label>
            <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
            <label>Confirmation - mot de passe :</label>
            <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
            <input type="submit" value="Mettre à jour mon mot de passe" onclick="NewMdp()" />
        </form>
        <?php if(isset($msg)) { echo $msg; } ?>
    </div>
</div>

<?php require('footer.php'); ?>