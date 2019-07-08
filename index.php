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
    else if ($url[1] == 'createComment') {
        echo($url[1]);
        $author = $_POST['author'];
        $content = $_POST['content'];
        $commentController->addComment($url[1], $author, $content);
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

    else if ($url[1] == 'confirm') {
        $app = (int) $_GET['approuve'];
        $adminController->approuveComment($app);
    }

    else if ($url[1] == 'create') {
        // appele function create chapters
        $title = $_POST['title'];
        $content = $_POST['content'];
        $adminController->postAdmin($title, $content);
    }
    else if ($url[1] == 'update') {  
        $adminController->editpostAdmin($url[1], $id);
    }
    else if ($url[1] == 'delete') {
        $adminController->deletepostAdmin($id);
    }
    else if ($url[1] == 'deleteComment') {
        $suppr = (int) $_GET['suppr'];
        $adminController->deleteCommentAdmin($suppr);
    }
} 