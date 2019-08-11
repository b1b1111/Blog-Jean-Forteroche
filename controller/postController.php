<?php

namespace Benjamin\Alaska\Controller;

require_once('model/postManager.php');
require_once('model/CommentManager.php');
class postController {

    function __construct() {
        $this->postManager = new \Benjamin\Alaska\Model\postManager();  
        $this->commentManager = new \Benjamin\Alaska\Model\CommentManager();  
    }

    //Page accueil
    public function getPosts() {
        $posts = $this->postManager->getPosts();
        require 'view/frontend/accueil.php';
    }

    //Retourne la liste des chapitres.
    public function printChapters() {
        $posts = $this->postManager->getPosts();
        require('view/frontend/listPostView.php');
    }

    // Afficher le contenu d'un chapitre
    public function showChapter($id) {
        $post = $this->postManager->getPost($id);
        $comments = $this->commentManager->getComments($id);
        require 'view/frontend/postView.php'; 
    }

    //Envoie de mail
    public function contact() {
        
        if(isset($_POST['mailform'])) {
            if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])) {
                //Version d'encodage mail.
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"Jean Forteroche"<forteroche.jean44@gmail.com>'."\n";
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
                
                mail('forteroche.jean44@gmail.com', "Contact - alaska.fr", $message, $header);
            }
        }

        if(isset($message))
		{
			header('Location: '. $_POST['URL_PATH'] . 'contact'); 
			exit;
		}
        
        $this->postManager->getPosts();
        require 'view/frontend/contact.php'; 
    }

    /**
     * Formulaire d'inscription a l'espace membre.
     */
    public function inscription() {
        if(isset($_POST['forminscription'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = sha1($_POST['mdp']);
            

            if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])) {
                $pseudolength = strlen($pseudo);
                $req = $this->postManager->getPseudo($pseudo);
                if($pseudolength <= 255) {
                    if($req == 0) {
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $reqmail = $this->postManager->getMail($mail);
                                if($reqmail == 0) {
                                    $insertmbr = $this->postManager->getMembre($pseudo, $mail, $mdp);
                                    $erreur = "Votre compte a bien été créé ! <a href=\"http://alaska.webagency-lefebvre.fr/profil\">Me connecter</a>";
                                } 
                                else {
                                $erreur = "Adresse mail déjà utilisée !";
                                }
                        } 
                        else {
                            $erreur = "Votre adresse mail n'est pas valide !";
                        }
                    }
                    else {
                    $erreur = "Pseudo déjà utilisé !";
                    }
                }
                else {
                  $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
                }
            } 
            else {
               $erreur = "Tous les champs doivent être complétés !";
            }
        }
        $this->postManager->getPosts();
        require 'view/frontend/inscription.php';
    }

    /**
     * Formulaire de connexion a l'espace membre.
     */
    public function connexion() {
        if(isset($_POST['formconnexion'])) {
            $mailconnect = htmlspecialchars($_POST['mailconnect']);
            $mdpconnect = sha1($_POST['mdpconnect']);

            if(!empty($mailconnect) AND !empty($mdpconnect)) {
               $req = $this->postManager->userExist($mailconnect, $mdpconnect);
                if($req) {
                    $user = $this->postManager->getUser($mailconnect, $mdpconnect);
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['admin'] = !!$user['admin'];
                    header('Location: '. $_POST['URL_PATH'] . 'profil?id='.$user['id']);
                } 
                else {
                    $erreur = "Mauvais mail ou mot de passe !";
                }
            } 
            else {
               $erreur = "Tous les champs doivent être complétés !";
            }
        }
        
        $this->postManager->getPosts();
        require 'view/frontend/connexion.php'; 
    }


    /**
     * Page du profil membre.
     */
    public function profil($getid){
        $req = $this->postManager->getUsers($getid);
        if(isset($_GET['id']) AND $_GET['id'] > 0) {
            $getid = intval($_GET['id']);
        }
        require 'view/frontend/profil.php';
    }

    /**
     * Page de modification du profil.
     */
    public function editProfil($getid) {
        $req = $this->postManager->getUsers($getid);
        if(isset($_SESSION['id'])) {
            $user = $this->postManager->editMembre();
            if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
            $this->postManager->editPseudo();
            header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            }
            if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
            $this->postManager->editMail();
            header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            }
            if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);
            if($mdp1 == $mdp2) {
                $this->postManager->editMdp();
                header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            } else {
                $msg = "Vos deux mot de passe ne correspondent pas !";
            }
            }
        }
        else {
            header('Location: '. $_POST['URL_PATH'] . 'profil');
         }

        require 'view/frontend/editProfil.php';
    }

    /**
     * Récupération du mot de passe.
     */
    public function recupMdp() {
        if(isset($_POST['formRecup'])) {
            $mailconnect = htmlspecialchars($_POST['mailconnect']);

            if(!empty($mailconnect)) {
               $req = $this->postManager->recupMP($mailconnect);
                if($req) {
                    $user = $this->postManager->recupUser($mailconnect);
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['mail'] = $user['mail'];
                    header('Location: '. $_POST['URL_PATH'] . 'profil' . '/' . 'reboot?id='.$user['id']);
                } 
                else {
                    $erreur = "Adresse email inconnue";
                }
            } 
        }
        
        $this->postManager->getPosts();
        require 'view/frontend/recuperation.php'; 
    }

    /**
     * Page de modification Mp.
     */
    public function rebootMp($getid){
        $req = $this->postManager->getUsers($getid);
        if(isset($_GET['mail']) AND $_GET['mail'] > 0) {
            $getid = intval($_GET['mail']);
        }
        require 'view/frontend/reboot.php';
    }

    /**
     * Page de renouvellement du mot de passe.
     */
    public function editMP($getid) {
        $req = $this->postManager->getUsers($getid);    
        if(isset($_SESSION['mail'])) {
            $user = $this->postManager->editMembre();
            if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);
                if($mdp1 == $mdp2) {
                    $this->postManager->modifMdp();
                    header('Location: '. $_POST['URL_PATH'] . 'profil');
                } 
                else {
                    $msg = "Vos deux mot de passe ne correspondent pas !";
                }
            }
        }

        require 'view/frontend/rebootMp.php';
    }

    /**
     * Deconnexion du profil
     */
    public function deconnexion() {
        $req = $this->postManager->getPosts();
        header('Location: '. $_POST['URL_PATH'] . 'profil');
        require 'view/frontend/deconnexion.php';
    }

    /**
     * Espace administration.
     */
    public function administration() {
        $posts = $this->postManager->getPosts();
        $comments = $this->commentManager->getAllComments();
        require 'view/frontend/administration.php';
    }

    /**
     * Espace modification commentaires administration.
     */
    public function adminComment() {
        $posts = $this->postManager->getPosts();
        $comments = $this->commentManager->getAllComments();
        require 'view/frontend/adminComment.php';
    }

    /**
     * Espace modifications chapitres administration.
     */
    public function adminChapter() {
        $posts = $this->postManager->getPosts();
        $comments = $this->commentManager->getAllComments();
        require 'view/frontend/adminChapter.php';
    }

    public function error() {
        $posts = $this->postManager->getPosts();
        require 'view/frontend/error.php';
    }
}