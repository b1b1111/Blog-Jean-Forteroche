<?php
require('controller/frontend.php');

$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if ($url == '') {
    require 'view/frontend/Accueil.php';
} 

else if($url[0] == 'contact' AND !empty($url[0])) {
    $idContact = $url[0];
    require 'view/frontend/contact.php';
} 

else if($url[0] == 'administration' AND !empty($url[0])) {
    
    require 'view/frontend/administration.php';
} 

else {
    require 'view/frontend/error.php';
}