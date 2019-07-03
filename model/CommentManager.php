<?php

namespace Benjamin\Alaska\Model;

require_once("model/manager.php");
class CommentManager extends manager {

    function __construct() {
        $this->newManager = new \Benjamin\Alaska\Model\Manager(); 
         
    }

    public function getAllComments() {

        $db = $this->newManager->dbConnect();
        $comments = $db->query('SELECT id, author, content, alert, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');

        return $comments;
    }
    //Retourne les commentaires d'un chapitre
    public function getComments($post_id) {

        $db = $this->newManager->dbConnect();
        $comments = $db->prepare('SELECT id, author, content, alert, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($post_id));

        return $comments;
    }

    // Publier un nouveau commentaire
    public function postComment($post_id, $author, $content) {
        
        $db = $this->newManager->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $author, $content));

        return $affectedLines;
    }

    // Signaler un commentaire.
    public function reportComment($id) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE comments SET alert = alert + 1 WHERE id = ?');

        $alertedComment = $request->execute(array($id));

        return $alertedComment;
    }

    // Modifier un commentaire
    public function updateComment($id, $content) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE comments SET content = ?, comment_date = NOW() WHERE id = ?');
        $comment = $request->execute(array($content, $id));
        // Résultat
        return $comment;
    }

    // Supprimer un commentaire
    public function deleteComment($id) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('DELETE FROM comments WHERE id = ?');
        $request->execute(array($id));
        $deletedComment = "Le message n° ".$id." a bien été supprimé.";
        return $deletedComment;
    }
}