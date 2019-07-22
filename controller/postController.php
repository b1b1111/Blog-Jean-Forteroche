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

    public function administration() {
        $posts = $this->postManager->getPosts();
        $comments = $this->commentManager->getAllComments();
        require 'view/frontend/administration.php';
    }
}