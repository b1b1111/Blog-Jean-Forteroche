<?php

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

if ($url == '') {
    $postController->getPosts();
} 

else if($url[0] == 'chapitres' AND !empty($url[0])) {
    if (empty($url[1])) {
        $postController->printChapters();
    }

    else if(is_numeric($url[1])) {
        $postController->showChapter($id);  
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

else if($url[0] == 'contact' AND !empty($url[0])) {
    $postController->contact();
} 

else if($url[0] == 'administration' AND !empty($url[0])) {
    $postController->administration();

    if ($url[1] == 'create') {
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
} 

else {
    require 'view/frontend/error.php';
}