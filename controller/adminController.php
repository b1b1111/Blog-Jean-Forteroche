<?php

namespace Benjamin\Alaska\Controller;

require_once('model/CommentManager.php');
require_once('model/Message.php');
require_once('model/postManager.php');

class adminController {

   function __construct() {
      $this->CommentManager = new \Benjamin\Alaska\Model\CommentManager();
      $this->Message = new \Benjamin\Alaska\Model\Message(); 
      $this->postManager = new \Benjamin\Alaska\Model\postManager();  
   }  
    
    // Liste des chapitres et commentaires signalés
    public function indexAdmin() {

        $posts = $this->postManager->getPosts();
        $comments = $this->CommentManager->getReportedComments();
        // Vue
        require 'view/frontend/administration.php';
    }

    // Créer un chapitre
    public function postAdmin($title, $content) {
        // Si la requête serveur est une méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($title) && !empty($content)) {
               $this->postManager->addPost($title, $content);
               $this->Message->setSuccess("<p>Votre billet a bien été publié !</p>");
            }
            else {
                
               $this->Message->setError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        // Sinon on reste sur la page
        $adminController = new AdministrationController();
        $adminController->indexAdmin();
    }

    // Modifier un chapitre
    public function editpostAdmin($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postManager->updatePost($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
            $this->Message->setSuccess("<p>Merci, votre billet a bien été modifié !</p>");
        }
        $post = $this->postManager->getPost($id);

        require 'views/editPost.php';
    }

    // Supprimer un chapitre
    public function deletepostAdmin($id) {
        $deletedPost = $this->postManager->deletePost($id);
        
        if ($deletedPost === false) {
            throw new Exception("Impossible de supprimer le billet !");
        }
        else {
            header('Location: ?controller=adminController&action=indexAdmin');
        }
    }
}