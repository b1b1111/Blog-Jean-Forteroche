<?php

$bdd = new \PDO('mysql:host=localhost;dbname=jean forteroche;charset=utf8', 'root', '');

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

if(isset($_GET['type']) AND $_GET['type'] == 'posts') {
   if(isset($_GET['approuve']) AND !empty($_GET['approuve'])) {
      $approuve = (int) $_GET['approuve'];
      $req = $bdd->prepare('UPDATE posts SET approuve = 1 WHERE id = ?');
      $req->execute(array($approuve));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM posts WHERE id = ?');
      $req->execute(array($supprime));
   }
}

if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_post = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
   $edit_post->execute(array($edit_id));
   if($edit_post->rowCount() == 1) {
      $edit_post = $edit_post->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}

$comment = $bdd->query('SELECT * FROM comments ORDER BY id DESC LIMIT 0,15');
$posts = $bdd->query('SELECT * FROM posts ORDER BY id DESC LIMIT 0,15');
$update = $bdd->query('UPDATE posts SET title=[value-2], content=[value-3]');
?>