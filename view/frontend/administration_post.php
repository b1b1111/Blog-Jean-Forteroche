<?php 

    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $bdd = new mysqli('localhost', 'root', '', 'jean forteroche');

    if ($bdd->connect_error) {
        echo 'database connect error';
    }

    $req = $bdd->prepare("INSERT INTO posts(title, content) VALUES (?, ?, ?)");
   

    $req->bind_param("sss",$title,$resum_post,$content);

        if($req->execute()){
            header("Location: http://localhost/coursphp/Jean-Forteroche/administration");
            exit;
        }
        else {
            echo 'failure';
        }
?>