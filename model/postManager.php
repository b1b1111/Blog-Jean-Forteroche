<?php

namespace Benjamin\Alaska\Model;

require_once("model/manager.php");
class postManager extends manager {

    function __construct() {
        $this->newManager = new \Benjamin\Alaska\Model\Manager();  
    }

    // liste des Chapitres
    public function getPosts() {

        $db = $this->newManager->dbConnect();
        
        $request = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');    
        return $request;
    }

    // Renvoie les informations d'un chapitre
    public function getPost($id) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');

        $request->execute(array($id));
        $post = $request->fetch();
        return $post;
    }

    // Création d'un nouveau chapitre
    public function addPost($title, $content) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
        $request->execute(array($title, $content));
    }

    // Appouver un chapitre
    public function approuvePost($id) {
        
        $db = $this->newManager->dbConnect();
        $req = $db->prepare('UPDATE posts SET approuve = 1 WHERE id = ?');
        $req->execute(array($id));
    }

    // Modification d'un chapitre
    public function updatePost($id, $title, $content) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $post = $request->execute(array($id, $title, $content,));
        return $post;    
    }

    // Supprimer un chapitre
    public function deletePost($id) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id = ?');
        $suppr = $request->execute(array($id));
        return $suppr;
    }
}

