<?php

namespace OpenClassrooms\Blog\Controller;

require_once('model/CommentManager.php');

class commentController {

    function __construct() {
        $this->commentManager = new \OpenClassrooms\Blog\Model\CommentManager();   
    }

   // $comments = $commentManager->getComments($_GET['id']);

    public function addComment($postId, $author, $comment) {

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: chapters.php?action=post&id=' . $postId);
        }
    }  
}