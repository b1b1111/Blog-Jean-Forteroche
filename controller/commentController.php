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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($author) && !empty($content)) {
                $this->CommentManager->postComment($post_id, $author, $content);
                $this->Message->Success("<p>Votre commentaire a bien été publié !</p>");  
            }

            else {
                $this->Message->CommentError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        $newPostController = new PostController();
        $newPostController->showComment($post_id);
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