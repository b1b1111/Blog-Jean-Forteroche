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
    public function addComment($author, $content) {
        $postComment = $this->CommentManager->postComment($author, $content);
        header('Location: '. $_POST['URL_PATH'] . 'chapitres');
    }

    // Signaler un commentaire
    public function alertComment($id, $post_id) {
        $alertedComment = $this->CommentManager->signalComment($id);
        
        if ($alertedComment === false) {
            throw new \Exception("Impossible de signaler le commentaire !");
        }
        else {
            header('Location: ?controller=postController&action=showComment&id=' . $post_id);
        }
    }
}