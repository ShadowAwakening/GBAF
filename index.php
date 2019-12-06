<!--Condition php pour entrer sur la page-->
<?php 
if (isset($_POST['username']) && isset ($_POST['password']) && ($_POST['password']) == 'kangourou'){ ?>

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

<?php }else{?>

    <p>Identifiant de connexion invalide. Veuillez reesayer.</p>
    <a href="login.php">Retour a la page de connexion</a>
<?php
}
?>