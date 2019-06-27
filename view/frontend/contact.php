<?= $idContact ?>
<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php'); 
$menu = view_menu(); 
?>

<?php ob_start(); ?>

<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"Jean Forteroche"<jeanForteroche44@gmail.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        

		$message='
		<html>
			<body>
				<div align="center">
					
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
				
				</div>
			</body>
		</html>
        ';
        
		mail('jeanForteroche44@gmail.com', "Contact - alaska.fr", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>

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

		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
