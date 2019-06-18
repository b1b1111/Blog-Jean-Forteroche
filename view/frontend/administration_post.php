<?php 

    $title = $_POST['title'];
    $content = $_POST['content'];

    $bdd = new mysqli('localhost','root','','Jean Forteroche');

    if ($bdd->connect_error) {
        echo 'database connect error';
    }

    $req = $bdd->prepare("INSERT INTO posts(title, content) VALUES (?, ?)");

    $req->bind_param("ss",$title,$content);

        if($req->execute()){
            echo 'success';
        }else {
            echo 'failure';
        }
?>