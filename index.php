<?php
session_start();

use Benjamin\Alaska\Controller\adminController;

$_POST['URL_PATH'] = 'http://alaska.webagency-lefebvre.fr/';

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

        if (!empty($url[2]) && $url[2] == 'createComment') {
            
            $user_id = $_SESSION['id'];
            $content = $_POST['content'];
            $commentController->addComment($url[1], $user_id, $content);
            header('Location: '. $_POST['URL_PATH'] . $url[0] . '/' . $url[1]);
        } 
        $postController->showChapter($url[1]); 
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

/*--------------------------------------ESPACE MEMBRE----------------------------------------*/

/**
 * Connexion espace membre
 */

else if($url[0] == 'profil') {
    if(empty($url[1])) {
    $postController->profil($getid);
    }

    else if($url[1] == 'connexion') {
        $postController->connexion();
    }

    else if($url[1] == 'inscription') {
        $postController->inscription();
    } 

    else if($url[1] == 'editProfil') {
        $postController->editProfil($getid);
    }

    else if($url[1] == "deconnexion") {
        $postController->deconnexion();
    }

    else if($url[1] == "recuperation") {
        $postController->recupMdp($mailexist);
    }

    else if($url[1] == "reboot") {
        $postController->connexionRecup();
    }

    else if($url[1] == 'editMP') {
        $postController->editMP($getid);
    }
} 

/*------------------------------------ADMINISTRATION------------------------------------*/

/*-----------------Accueil administration---------------------*/
else if($url[0] == 'administration') {
    if(empty($url[1])) { 
        $postController->administration();
    }

    else if($url[1] == 'adminComment') {
        $postController->adminComment();
    }

    else if($url[1] == 'adminChapter') {
        $postController->adminChapter();
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
    else if ($url[1] == 'editPost' && is_numeric($url[2]))  {
        if ($url[3] == 'prepare') {
            $adminController->editPostPrepare($url[2]);
        }
        else { 
            $title = $_POST['title'];
            $content = $_POST['content'];
            $adminController->editPostAdmin($url[2], $title, $content);
            header('Location: '. $_POST['URL_PATH'] . 'administration' . '/' . 'adminChapter'); 
        }
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
} 

else {
    echo ('notfound');
}