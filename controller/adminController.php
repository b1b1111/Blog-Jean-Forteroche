<?php

namespace Benjamin\Alaska\Controller;

require_once('model/CommentManager.php');
require_once('model/postManager.php');

class adminController {

   function __construct() {
      $this->CommentManager = new \Benjamin\Alaska\Model\CommentManager();
      $this->postManager = new \Benjamin\Alaska\Model\postManager();  
   }  

    // Créer un chapitre
    public function postAdmin($title, $content) {     
        $post = $this->postManager->addPost($title, $content);
        header('Location: '. $_POST['URL_PATH'] . 'administration');
    }
        
    // Modifier un chapitre

    public function editPostAdmin($id, $title, $content) {
        var_dump($id);
        var_dump($title);
        var_dump($content);
        
        $edit_article = $this->postManager->updatePost($id, $title, $content);           
    }

    public function editPostPrepare($id) {
        $post = $this->postManager->getPost($id);  
        require 'view/frontend/editPost.php';        
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
