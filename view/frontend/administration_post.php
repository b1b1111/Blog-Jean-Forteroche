<?php 

if (isset($_POST['submit'])) {
    
    $req = $bdd->prepare('INSERT INTO `posts`(`title`, `content`) VALUES (?,?)');
    $req->execute(array($_POST['title'], $_POST['editeur']));
}

?>