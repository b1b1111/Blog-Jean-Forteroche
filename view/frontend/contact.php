<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>

	<h2 id="contact_title">Formulaire de contact</h2>
	<form method="POST" action="" id="contact_form">
		<input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />

		<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />

		<textarea name="message" placeholder="Votre message" cols="20" rows="10"><?php 
				if(isset($_POST['message'])) { 
					echo $_POST['message']; 
				} 
			
				?></textarea><br /><br />
		<input class="form_btn"  type="submit" value="Envoyer !" name="mailform"/>
	</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
