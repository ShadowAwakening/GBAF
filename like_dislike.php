<?php
session_start();

                        // ARTICLES

// Essaie de se connecter a la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

// Stop le processus et affiche l'erreur si pblm de connexion a la BDD
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if(isset($_GET['t']) && isset($_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    $sessionid = $_SESSION['id'];
    $check = $bdd->prepare('SELECT id_article FROM articles WHERE id_article = ?');
    $check->execute(array($getid));
    if($check->rowCount() == 1) {
       if($gett == 1) {
          $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
          $check_like->execute(array($getid,$sessionid));
          $del = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
          $del->execute(array($getid,$sessionid));
          if($check_like->rowCount() == 1) {
             $del = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
             $del->execute(array($getid,$sessionid));
          } else {
             $ins = $bdd->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
             $ins->execute(array($getid, $sessionid));
          }
          
       } elseif($gett == 2) {
          $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
          $check_like->execute(array($getid,$sessionid));
          $del = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
          $del->execute(array($getid,$sessionid));
          if($check_like->rowCount() == 1) {
             $del = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
             $del->execute(array($getid,$sessionid));
          } else {
             $ins = $bdd->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
             $ins->execute(array($getid, $sessionid));
          }
       }
       header('Location: page_commentaire_acteur.php?id='.$getid);
    } else {
       exit('Erreur fatale. <a href="page_accueil.php">Revenir à l\'accueil</a>');
    }
 } else {
    exit('Erreur fatale. <a href="page_accueil.php">Revenir à l\'accueil</a>');
 }
?>