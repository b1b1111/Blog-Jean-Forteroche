<?php

require 'controller/postController.php';
require 'controller/commentController.php';

$postController = new \OpenClassrooms\Blog\Controller\postController();
$commentController = new \OpenClassrooms\Blog\Controller\commentController();

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
    else if ($url[1] == 'create') {
        // appele function create chapters
    }
    else if ($url[1] == 'update') {
        // appele function update chapters
    }
    else if ($url[1] == 'delete') {
        // appele function delete chapters
    }
    else if (is_numeric($url[1])) {
        $postController->printChapter($url[1]);
        // appele function create chapters
    }

} 

else if($url[0] == 'contact' AND !empty($url[0])) {
    $idContact = $url[0];
    require 'view/frontend/contact.php';
} 

else if($url[0] == 'administration' AND !empty($url[0])) {
    if ($url[1] == '') {
        require 'view/frontend/administration.php';
    }
    else if($url[1] == 'update_post') {
        require 'controller/frontend.php';
    }
} 

else {
    require 'view/frontend/error.php';
}