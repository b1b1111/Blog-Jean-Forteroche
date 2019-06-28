<?php

namespace Benjamin\Alaska\Model;

require_once("model/manager.php");
class postManager extends manager {
    // Obtenir la liste des billets
    public function getPosts() {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%i\') AS creation_date_fr, FROM posts ORDER BY creation_date DESC');
       
        return $request;
    }

    // Renvoie les informations d'un billet
    public function getPost($id) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, FROM posts WHERE id = ?');

        $request->execute(array($id));
        $post = $request->fetch();
        return new Post($post['id'], $post['title'], $post['content'], $post['creation_date_fr']);
    }

    // Création d'un nouveau billet
    public function addPost($title, $content) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');

        $request->execute(array($title, $content));
    }

    // Modification d'un billet
    public function updatePost($id, $title, $content) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $post = $request->execute(array($title, $content, $id));

        return $post;
    }

    // Supprimer un billet
    public function deletePost($id) {

        $newManager = new Manager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id = ?');

        $request->execute(array($id));
    }
}

