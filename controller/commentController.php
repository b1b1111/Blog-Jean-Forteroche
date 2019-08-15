<?php

namespace Benjamin\Alaska\Controller;

require_once('model/CommentManager.php');
require_once('model/postManager.php');
class commentController {

    function __construct() {
        $this->CommentManager = new \Benjamin\Alaska\Model\CommentManager();
        $this->postManager = new \Benjamin\Alaska\Model\postManager();  
        $this->newManager = new \Benjamin\Alaska\Model\Manager();  
    }

    // Nouveau commentaire
    public function addComment($post_id, $user_id, $content) {
        $comments = $this->CommentManager->postComment($post_id, $user_id, $content);
        
    }

    // Signaler un commentaire
    public function alertComment($id) {
        $alertedComment = $this->CommentManager->reportComment($id);  
        $alert = $_POST['alert'];    
        header('Location: '. $_POST['URL_PATH'] . 'chapitres'); 
    }

      
}