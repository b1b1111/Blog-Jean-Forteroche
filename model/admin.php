<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=Jean Forteroche;charset=utf8', 'root', '');


if(isset($_GET['type']) AND $_GET['type'] == 'comments') {
   if(isset($_GET['approuve']) AND !empty($_GET['approuve'])) {
      $approuve = (int) $_GET['approuve'];
      $req = $bdd->prepare('UPDATE comments SET approuve = 1 WHERE id = ?');
      $req->execute(array($approuve));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
      $req->execute(array($supprime));
   }
}

$comment = $bdd->query('SELECT * FROM comments ORDER BY id DESC LIMIT 0,15');


?>