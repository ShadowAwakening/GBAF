<?php

// VERIFIE QUE LES CHAMPS SONT ENVOYES
if (isset($_POST['nom_utilisateur']) && isset($_POST['mp'])) {

    // VERIFIE QUE LES CHAMPS SONT REMPLIS
    if (!empty($_POST['nom_utilisateur']) && !empty($_POST['mp'])) {

            // CONNEXION A LA BDD
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            // STOCK
            $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);

            // REQUETE PREPARE : PREPARATION ($req n'est pas une variable mais un objet ...)
            $req = $bdd->prepare("SELECT id, firstname, name, username, question, answer, password, password_verify FROM membre WHERE username = :username");

            // EXECUTION
            $req->execute(array(
                'username' => $nom_utilisateur
            ));

            // STOCK LES RESULTATS DE LA REQUETE LIGNE PAR LIGNE DANS UN ARRAY -> ici $resultats
            $resultat = $req->fetch();
            // COMPARE LE MP RENTRE DANS LE FORMULAIRE AU MP STOCKE EN BDD AVEC LA FONCTION password_verify PUIS STOCK LE BOOLEEN DANS UNE VARIABLE
            $isPasswordCorrect = password_verify($_POST['mp'], $resultat['password']);


            if(!$resultat){
                echo 'Mauvais nom d\'utilisateur';
            }else{
                if($isPasswordCorrect){
                    // DEMARRE A SESSION ET DEFINIT DES VARIABLE UTILE POUR LES AUTRES PAGE -> RECURENCE
                    session_start();
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['prenom'] = $resultat['firstname'];
                    $_SESSION['nom'] = $resultat['name'];
                    $_SESSION['username'] = $resultat['username'];
                    $_SESSION['question'] = $resultat['question'];
                    $_SESSION['answer'] = $resultat['answer'];
                    $_SESSION['password'] = $resultat['password'];
                    $_SESSION['password_verify'] = $resultat['password_verify'];

                    ?>
        <!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Extranet Groupement Banquaire et Assurance Francaise</title>
    <meta name="description" content="Page d'accueil de l'extranet du Groupement Banque et Assurance Francaise">
    <link rel="stylesheet" href="style.css">

</head>

<body>
                            <!--  PARTIE 1 : HEADER -->

<!--    Header avec le logo et l'identifiant-->
    <?php include "header.php" ?>
<!--    Trait de separation des parties-->
    <hr>

                            <!--    PARTIE 2 : PRESENTATION GBAF-->

    <!--    Presentation du Groupe GBAF-->
    <?php include "section_1.php" ?>
    <hr>

                            <!--    PARTIE 3 : ACTEURS -->

    <!--    Presentation des acteurs-->
    <?php include "section_2.php" ?>
    <hr>

                            <!--    PARTIE 4 : FOOTER -->

    <!--    Mentions legales et Contact-->
     <?php include "footer.php" ?>



</body>

</html>
<?php
              }else{
                  echo'mauvais mot de passe';
              }
          }
  }else{
      echo 'veuillez remplir tout les champs';
  }

}else{?>

    <p>Identifiant de connexion invalide. Veuillez reesayer.</p>
    <a href="login.php">Retour a la page de connexion</a>
<?php
}
?>
