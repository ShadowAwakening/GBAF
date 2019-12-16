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

// Verifie que $_GET['id'] est present
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $getidentifiant = htmlspecialchars($_GET['id']);

    // Stock toute les donnees de la table articles dans $article ou id == $_GET['id']
    $article = $bdd->prepare('SELECT * FROM articles WHERE id_article = ?');
    $article->execute(array($getidentifiant));

    if ($article->rowCount() == 1) {
        $donnees_article  = $article->fetch();
        $id_article = $donnees_article['id_article'];
        $titre_article = $donnees_article['titre_article'];
        $text_article = $donnees_article['text_article'];
        $logo_article = $donnees_article['logo_article'];
        $likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
        $likes->execute(array($getidentifiant));
        $likes = $likes->rowCount();
        $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
        $dislikes->execute(array($getidentifiant));
        $dislikes = $dislikes->rowCount();
    } else {
        die('Cet article n\'existe pas !');
    }
} else {
    die('Erreur');
}



// COMMENTAIRES

// Verifie que les donnees sont bien envoyees
if (isset($_POST['envoyer_commentaire'])) {

    // Verifie que les POST sont present et non vide
    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {

        // Stock les POST dans des variables en appliquant la fonction htmlspecialchars qui convertit les caracteres speciaux en entites HTML
        $commentaire = htmlspecialchars($_POST['commentaire']);

        // insere les valeurs recuperer par les POST dans la table commentaires et stock dans $ins
        $ins = $bdd->prepare("INSERT INTO commentaires (commentaire, id_article, date_commentaire) VALUES (?,?,NOW())");
        $ins->execute(array($commentaire, $getidentifiant));

        // Affiche un message de validation si tout est ok
        $commentaire_message = "<span style='color:green'>Votre commentaire a bien été posté</span>";
    } else {
        $commentaire_message = "Erreur: Tous les champs doivent être complétés";
    }
}

// Creer $commentaires qui contient toute les donnees de la table commentaires qui correspond a $_GET['id'] et donc a l'article courant ...
$commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_article = ? ORDER BY id DESC LIMIT 0, 5');
$commentaires->execute(array($getidentifiant));
?>

<!-- CODE HTML -->
<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Extranet Groupement Banquaire et Assurance Francaise</title>
    <meta name="description" content="Page des commentaires de l'extranet du Groupement Banque et Assurance Francaise">
    <link rel="stylesheet" href="style_page_commentaire_acteur.css">


</head>

<body>

    <!--  PARTIE 1 : HEADER -->

    <!--    Header avec le logo et l'identifiant-->
    <?php include "header.php" ?>
    <!--    Trait de separation des parties-->
    <hr>


    <!--    PARTIE 2 : PRESENTATION GBAF-->

    <!--    Presentation du Groupe GBAF-->
    <p class='logo_acteur'><?= $donnees_article['logo_article'] ?></p>
    <h1><?= $donnees_article['titre_article'] ?></h1>
    <p class='presentation'><?= $donnees_article['text_article'] ?></p>
    <hr>


    <!--    PARTIE 3 : Commentaire -->

    <!--    Titre + Formulaire nouveau commentaire-->
    <div id="header_commentaire">
        <h2>Commentaires:</h2>
        <div class='formulaire_message_confirmation'>
        <form method="POST">
            <textarea name="commentaire" placeholder="Votre commentaire..." rows=3 cols=40></textarea><br />
            <input type="submit" value="Poster mon commentaire" name="envoyer_commentaire" />
        </form>
        <!-- Certifie le bon envoi du commentaire ou affiche une erreur -->
        <?php if (isset($commentaire_message)) {
            echo $commentaire_message;
        } ?>
        </div>
        <!--    Like / Dislike -->
        <div id="like_dislike">
            <p class='like'>(<?= $likes ?>)<a href="like_dislike.php?t=1&id=<?= $getidentifiant ?>"><img src="image/like.png" /></a></p>

            <p class='dislike'>(<?= $dislikes ?>)<a href="like_dislike.php?t=2&id=<?= $getidentifiant ?>"><img src="image/dislike.png" /></a></p>
        </div>
    </div>


    <br />

    <!-- Affiche les commentaire du plus recent au plus vieux -->
    <?php while ($commentaire = $commentaires->fetch()) { ?>

        <div id="commentaire_list">
            <p><strong><?= $_SESSION['prenom']  ?>:</strong></p>
            <p><?= $commentaire['date_commentaire'] ?></p>
            <p><?= $commentaire['commentaire'] ?></p>
        </div>

    <?php } ?>

    <hr />

    <!--    PARTIE 4 : FOOTER -->

    <!--    Mentions legales et Contact-->
    <?php include "footer.php" ?>



</body>

</html>