<?php 

    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $bdd = new mysqli('localhost', 'root', '', 'jean forteroche');

    if ($bdd->connect_error) {
        echo 'Erreur de connexion';
    }

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