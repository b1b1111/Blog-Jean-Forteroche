<?php

$_POST['URL_PATH'] = 'http://localhost/coursphp/Jean-Forteroche/';

require_once('controller/postController.php');
require_once('controller/commentController.php');
require_once('controller/adminController.php');

    $postController = new \Benjamin\Alaska\Controller\postController();
    $commentController = new \Benjamin\Alaska\Controller\commentController();
    $adminController = new \Benjamin\Alaska\Controller\adminController();
    
$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

//Accueil
if (empty($url)) {
    $postController->getPosts();
} 

else if($url[0] == 'chapitres') {
    if (empty($url[1])) {
        $postController->printChapters();
    }

    else if(is_numeric($url[1])) {
        
        echo($url[1]);
        $postController->showChapter($url[1]);  
    }

    else if ($url[1] == 'comment') {
        // appele function comment chapter
        $commentController->addComment($post_id, $author, $content);
    }
    else if ($url[1] == 'alert') {
        // appele function alert comment
        $adminController->alertComment($id, $post_id);
    }  
} 

else if($url[0] == 'contact') {
    $postController->contact();
} 

if($url[0] == 'administration') {
    if(empty($url[1])) { 
        $postController->administration();
    }

    else if ($url[1] == 'create') {

        // appele function create chapters
        $adminController->postAdmin($title, $content);
    }
    else if ($url[1] == 'update') {
        // appele function update chapters
        $adminController->editpostAdmin($id);
    }
    else if ($url[1] == 'delete') {
        // appele function delete chapters
        $adminController->deletepostAdmin($id);
    }
    else if ($url[1] == 'deleteComment') {
        $adminController->deleteCommentAdmin($_GET['id']);
    }
} 

else {
    require 'view/frontend/error.php';
}