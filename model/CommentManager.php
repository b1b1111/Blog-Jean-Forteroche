<?php

namespace Benjamin\Alaska\Model;

require_once("model/manager.php");
class CommentManager extends manager {
    //Obtenir les commentaires d'un billet
    public function getComments($post_id) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($post_id));

        return $comments;
    }

    // Publier un nouveau commentaire
    public function postComment($post_id, $author, $content) {
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $author, $content));

        return $affectedLines;
    }

    // Signaler un commentaire.
    public function reportComment($id) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE comments SET alert = alert + 1 WHERE id = ?');

        $alertedComment = $request->execute(array($id));

        return $alertedComment;
    }
    // Récupérer les commentaires signalés.
    public function getReportedComments() {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->query('SELECT id, post_id, author, content, alert, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %Hh%i\') AS comment_date_fr, FROM comments WHERE alert != 0 ORDER BY alert DESC LIMIT 15');

        $request->execute(array());
     
        return $request;
    }
    // Obtenir l'identifiant d'un commentaire
    public function getComment($id) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT id, post_id, author, content, alert, comment_date FROM comments WHERE id = ?');
        $request->execute(array($id));

        $comment = $request->fetch();
        return new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['content'], $comment['alert'], $comment['comment_date']);
    }

    // Modifier un commentaire depuis la page d'administration
    public function updateComment($id, $content) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE comments SET content = ?, comment_date = NOW() WHERE id = ?');
        $comment = $request->execute(array($content, $id));
        // Résultat
        return $comment;
    }
    // Supprimer un commentaire depuis la page d'administration
    public function deleteComment($id) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('DELETE FROM comments WHERE id = ?');

        $deletedComment = $request->execute(array($id));
        return $deletedComment;
    }
}