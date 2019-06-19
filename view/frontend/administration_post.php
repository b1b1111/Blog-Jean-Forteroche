<?php 

    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $bdd = new mysqli('localhost','webagencawben','Ben0ubenou','webagencawben');

    if ($bdd->connect_error) {
        echo 'database connect error';
    }

    $req = $bdd->prepare("INSERT INTO posts(title, content) VALUES (?, ?)");
   

    $req->bind_param("ss",$title,$content);

        if($req->execute()){
            header('Location: /administration');
        }
        else {
            echo 'failure';
        }
?>