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

/*--------------------------------------ACCUEIL----------------------------------------*/
if (empty($url)) {
    $postController->getPosts();
} 

/*--------------------------------------CHAPITRES----------------------------------------*/
else if($url[0] == 'chapitres') {
    if (empty($url[1])) {
        $postController->printChapters();
    }

    else if(is_numeric($url[1])) {        
        echo($url[1]);
        $postController->showChapter($url[1]);  

    }
    else if ($url[1] == 'createComment') {
        $post_id = $_POST['post_id'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $commentController->addComment($post_id, $author, $content);
    } 

    else if (($url[1] == 'alert')&&(is_numeric($url[2]))) {
        // appele function alert comment
        $commentController->alertComment($url[2]);
    }  
} 

/*--------------------------------------CONTACT----------------------------------------*/
else if($url[0] == 'contact') {
    $postController->contact();
} 

/*------------------------------------ADMINISTRATION------------------------------------*/

/*-----------------Accueil administration---------------------*/
else if($url[0] == 'administration') {
    if(empty($url[1])) { 
        $postController->administration();
    }

    /*-----------------Approuve Comment---------------------*/
    else if (($url[1] == 'confirm')&&(is_numeric($url[2]))) {  
        $adminController->approuveCommentAdmin($url[2]);
    }

    else if (($url[1] == 'alert')&&(is_numeric($url[2]))) {
        // appele function alert comment
        $commentController->alertComment($url[2]);
    }

    /*-----------------Delete Comment---------------------*/
    else if (($url[1] == 'deleteComment')&&(is_numeric($url[2]))) {
        $adminController->deleteCommentAdmin($url[2]);
    }

    /*-----------------Approuve chapter---------------------*/
    else if (($url[1] == 'confirmPost')&&(is_numeric($url[2]))) {  
        $adminController->approuvePostAdmin($url[2]);
    }

    /*-----------------Modified chapter---------------------*/
    else if ($url[1] == 'editPostAdmin') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $adminController->editPostAdmin($id, $title, $content);
    }

    /*-----------------Delete chapter---------------------*/
    else if (($url[1] == 'deletePost')&&(is_numeric($url[2]))) {
        $adminController->deletePostAdmin($url[2]);
    }

    /*-----------------Create chapter---------------------*/
    else if ($url[1] == 'create') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $adminController->postAdmin($title, $content);
    }  
    
    /*-----------------Create comment---------------------*/
    else if ($url[1] == 'createComment') {
        $post_id = $_POST['post_id'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $commentController->addComment($post_id, $author, $content);
    } 
} 

else {
    echo ('notfound');
}