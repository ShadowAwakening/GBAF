<?php 

if(!empty($_POST['nom_utilisateur']) && !empty($_POST['reponse'])){

// CONNEXION A LA BDD
require "config.php";
$bdd = new Config();

    session_start();
    
    $username = $_POST['nom_utilisateur'];
    
    $req = $bdd->prepare("SELECT username, question, answer FROM  membre WHERE username = :username && question = :question && answer = :answer ");

    $req->execute(array(
        'username' => htmlspecialchars($_POST['nom_utilisateur']),
        'question' => htmlspecialchars($_POST['question']),
        'answer' => htmlspecialchars($_POST['reponse'])
    ));

    $resultat = $req-> fetch();
    // var_dump($resultat);die;

    if(!$resultat){
        echo'Information erronees';
    }else{?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modification du mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
</head>

<body>

    <!--    HEADER LOGIN -->
    <div id="header_page_login"> 
        <p><img src="logos/logoGbaf.jpg" alt="Logo GBAF" /></p>
        <p>Bienvenue sur la page de modification du mot de passe du Groupement Banque et Assurance Francaise.</p>
    </div>
    <hr>

    <div class="container formPassLost">
        <h2>Créer nouveau mot de passe :</h2>
        <form action="traitement_password_lost_update.php" method="POST">
            <div class="form-group">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="nom_utilisateur" class="form-control">
            </div>
            <div class="form-group">
                <label>Nouveau mot de passe :</label>
                <input type="password" name="mp" class="form-control" />
            </div>
            <div class="form-group">
                <label>Vérification mot de passe :</label>
                <input type="password" name="mp_verify" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- Lien de retour a la page de login -->
    <div class="container infosContact lien">
        <p><a href="login.php">Revenir à la page de login</a></p> 
    </div>
    <hr>

        <!--    Mentions legales et Contact-->
    <footer>
        <p>|Mentions legales|</p>
        <p><a href="contact.php">Contact</a></p>
        <p>|</p>
    </footer>
</body>

</html>

<?php }

}
?>

