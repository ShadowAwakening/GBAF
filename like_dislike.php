<?php
session_start();

                        // ARTICLES

// CONNEXION A LA BDD
require "config.php";
$bdd = new Config();


// Verifie que les $_GET sont bien set et non vide
if(isset($_GET['t']) && isset($_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {

   // Stock les information dans des variable
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    $sessionid = $_SESSION['id'];

   //  Verifie que l'id du $_get existe dans la BDD
    $check = $bdd->prepare('SELECT id_article FROM articles WHERE id_article = ?');
    $check->execute(array($getid));

   //  Si le tableau stocker dans $check possede 1 ligne -> l'article existe
    if($check->rowCount() == 1) {
      //  $gett == 1  -> il sagit d'un like
       if($gett == 1) {
         //  verifie si l'utilisateur de la session a dejas liker l'article courant
          $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
          $check_like->execute(array($getid,$sessionid));
         //  S'il y a un dislike, le supprime
          $del = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
          $del->execute(array($getid,$sessionid));
         //  S'il y a deja un like ($check == 1), le supprime
          if($check_like->rowCount() == 1) {
             $del = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
             $del->execute(array($getid,$sessionid));
            //  S'il n'y a pas de like ($check ==0), en ajoute 1
          } else {
             $ins = $bdd->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
             $ins->execute(array($getid, $sessionid));
          }
          
         //  $gett == 2  -> il sagit d'un dislike 
       } elseif($gett == 2) {
          //  verifie si l'utilisateur de la session a dejas disliker l'article courant
          $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
          $check_like->execute(array($getid,$sessionid));
          //  S'il y a un like, le supprime
          $del = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
          $del->execute(array($getid,$sessionid));
          //  S'il y a deja un dislike ($check == 1), le supprime
          if($check_like->rowCount() == 1) {
             $del = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
             $del->execute(array($getid,$sessionid));
             //  S'il n'y a pas de dislike ($check ==0), en ajoute 1
          } else {
             $ins = $bdd->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
             $ins->execute(array($getid, $sessionid));
          }
       }
       header('Location: page_commentaire_acteur.php?id='.$getid); // Actualise la page
    } else {
       exit('Erreur fatale. <a href="page_accueil.php">Revenir à l\'accueil</a>');
    }
 } else {
    exit('Erreur fatale. <a href="page_accueil.php">Revenir à l\'accueil</a>');
 }
