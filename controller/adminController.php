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

    // Créer un chapitre
    public function postAdmin($title, $content) {
        
        $post = $this->postManager->addPost($title, $content);
        require 'view/frontend/administration.php';
    }
        
    // Modifier un chapitre
    public function editpostAdmin($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postManager->updatePost($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
            $this->Message->setSuccess("<p>Merci, votre billet a bien été modifié !</p>");
        }
        $post = $this->postManager->getPost($id);

        require 'view/frontend/administration.php';
    }

    // Supprimer un chapitre
    public function deletepostAdmin($id) {
        $deletedPost = $this->postManager->deletePost($id);
        
        require 'view/frontend/administration.php';
    }

    // Supprimer un commentaire
    public function deleteCommentAdmin($id)
    {
        $deletedComment = $this->CommentManager-> deleteComment($id);

        if ($deletedComment === false) {
            throw new \Exception("Impossible de supprimer le commentaire !");
        }
        else {
            header('Location: http://localhost/coursphp/Jean-Forteroche/administration/');
        }
        
    }  
     
}