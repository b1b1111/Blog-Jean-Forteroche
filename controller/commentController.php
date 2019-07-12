<?php

namespace Benjamin\Alaska\Controller;

require_once('model/CommentManager.php');
require_once('model/Message.php');
class commentController {

    function __construct() {
        $this->CommentManager = new \Benjamin\Alaska\Model\CommentManager();
        $this->Message = new \Benjamin\Alaska\Model\Message();   
    }

    // Nouveau commentaire
    public function addComment($post_id, $author, $content) {
        $comments = $this->CommentManager->postComment($post_id, $author, $content);
    }

    // Signaler un commentaire
    public function alertComment($id) {
        $alertedComment = $this->CommentManager->reportComment($id);  
        header('Location: '. $_POST['URL_PATH'] . 'chapitres'); 
    }
}