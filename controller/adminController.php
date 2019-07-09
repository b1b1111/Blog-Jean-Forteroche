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
        header('Location: '. $_POST['URL_PATH'] . 'administration');
    }
        
    // Modifier un chapitre
    public function editpostAdmin($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postManager->updatePost($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
        }
        $post = $this->postManager->getPost($id);
        header('Location: '. $_POST['URL_PATH'] . 'administration');
    }

    // Approuver un chapitre
    public function approuvePostAdmin($id) {
        $approuve = $this->postManager->approuvePost($id);   
        header('Location: '. $_POST['URL_PATH'] . 'administration');   
    }

    // Supprimer un chapitre
    public function deletePostAdmin($id) {
        $deletedPost = $this->postManager->deletePost($id);
        header('Location: '. $_POST['URL_PATH'] . 'administration');
    }

    // Approuver un commentaire
    public function approuveCommentAdmin($id) {
        
        $approuve = $this->CommentManager->approuveComment($id);   
        header('Location: '. $_POST['URL_PATH'] . 'administration');   
    }

    // Supprimer un commentaire
    public function deleteCommentAdmin($id) {
               
        $supprime = $this->CommentManager->deleteComment($id);
        header('Location: '. $_POST['URL_PATH'] . 'administration');    
    }
}
