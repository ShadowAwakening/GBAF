<?php

// VERIFIE QUE LES CHAMPS SONT ENVOYES
if (isset($_POST['nom_utilisateur']) && isset($_POST['mp'])) {

    // VERIFIE QUE LES CHAMPS SONT REMPLIS
    if (!empty($_POST['nom_utilisateur']) && !empty($_POST['mp'])) {

            // CONNEXION A LA BDD
            require "config.php";

            try {
                $bdd = new PDO("mysql:host=$serverName;dbname=$database", $usernameDb, $passDb);
                
                 // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }

            // STOCK
            $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);

            // REQUETE PREPARE : PREPARATION ($req n'est pas une variable mais un objet ...)
            $req = $bdd->prepare("SELECT id, firstname, name, username, question, answer, passwords, password_verify FROM membre WHERE username = :username");

            // EXECUTION
            $req->execute(array(
                'username' => $nom_utilisateur
            ));

            // STOCK LES RESULTATS DE LA REQUETE LIGNE PAR LIGNE DANS UN ARRAY -> ici $resultats
            $resultat = $req->fetch();
            // COMPARE LE MP RENTRE DANS LE FORMULAIRE AU MP STOCKE EN BDD AVEC LA FONCTION password_verify PUIS STOCK LE BOOLEEN DANS UNE VARIABLE
            $isPasswordCorrect = password_verify($_POST['mp'], $resultat['passwords']);


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
                    // $_SESSION['password'] = $resultat['passwords'];
                    // $_SESSION['password_verify'] = $resultat['password_verify'];
                    header('Location: page_accueil.php');

              }else{?>
<p>Mauvais mot de passe :</p>
<a href="login.php">Retour à la page de connexion</a>
<?php }
              
          }
  }else { ?>

<p>Identifiants de connexion invalide. Veuillez reesayer.</p>
<a href="login.php">Retour a la page de connexion</a>
<?php } 

}else { ?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Identification extranet GBAF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!--    HEADER LOGIN -->
    <div id="header_page_login"> 
        <p><img src="logos/logoGbaf.jpg" alt="Logo GBAF" /></p>
        <p>Bienvenue sur la page de connexion à l'extranet du Groupement Banque et Assurance Francaise.</p>
    </div>
    <hr>
    <!--    FORMULAIRE DE CONNEXION-->

        <div class="container formLog">
        <h2>Connexion :</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="nom_utilisateur" class="form-control">
            </div>
            <div class="form-group">
                <label>Nouveau mot de passe :</label>
                <input type="password" name="mp" class="form-control" />
            </div>
            <div class="form-group">
                <label><a href="password_lost.php">Mot de passe oublié</a></label> 
</div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form> 
    </div>
    <hr>



        <!--    FORMULAIRE D'INSCRIPTION-->

    <div class="container formLog">
        <h2>Inscription :</h2>
        <form action="inscription.php" method="POST">
            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" class="form-control">
            </div>
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="form-group">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="nom_utilisateur" class="form-control">
            </div>
            <div class="form-group">
                <label>Question :</label>
                    <select name="question" class="form-control">>
                        <option>Nom de votre meilleur amis d'enfance ?</option>
                        <option>Dans quelle ville avez-vous grandit ?</option>
                        <option>Nom de votre premiere copine ?</option>
                        <option>Marque de votre première voiture ?</option>
                    </select>
            </div>
            <div class="form-group">
                <label>Réponse :</label>
                <input type="text" name="reponse" class="form-control">
            </div>
            <div class="form-group">
                <label>Mot de passe :</label>
                <input type="password" name="mp" class="form-control" />
            </div>
            <div class="form-group">
                <label>Vérification mot de passe :</label>
                <input type="password" name="mp_verify" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Inscription</button>
        </form>
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

<?php } ?>