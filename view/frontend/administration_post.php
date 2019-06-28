<?php 

    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $bdd = new mysqli('localhost', 'root', '', 'jean forteroche');

    $req = $bdd->prepare("INSERT INTO posts(title, content) VALUES (?, ?)");

    $req->bind_param("ss",$title,$content);

        if($req->execute()){
            header("Location: http://localhost/coursphp/Jean-Forteroche/administration");
            exit;
        }
        else {
            echo 'Erreur';
        }
?>