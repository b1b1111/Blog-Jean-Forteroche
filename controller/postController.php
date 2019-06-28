<?php
// Chargement des classes
namespace OpenClassrooms\Blog\Controller;

require_once('model/postManager.php');

class postController { 

    function __construct() {
        $this->postManager = new \OpenClassrooms\Blog\Model\PostManager();   
    }

    public function getPosts() {
        $posts = $this->postManager->getPosts();
        require 'view/frontend/accueil.php';
    }

     public function printChapters() {
        $posts = $this->postManager->getPosts();
        require('view/frontend/listPostView.php');
    }
 
    public function viewPost() {
        
    }

    
    public function post() {
    
        $post = $this->postManager->getPost($_GET['id']);
        
    
        require('view/frontend/postView.php');
    }
    
    public function editPost() { 
        if(isset($_POST['title']) AND isset($_POST['content']) AND isset($_POST['id'])) {
            $db = dbConnect();
            $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
            $req->execute(array($_POST['title'], $_POST['content'], $_POST['id']));
          }
    }
}

