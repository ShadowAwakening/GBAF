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
<a href="login.php">Retour a la page de connexion</a>
<?php }
              
          }
  }else { ?>

<p>Identifiant de connexion invalide. Veuillez reesayer.</p>
<a href="login.php">Retour a la page de connexion</a>
<?php } 

}else { ?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Identification extranet GBAF</title>
    <link rel="stylesheet" href="style_login.css">
</head>

<body>

    <!--    HEADER LOGIN -->
    <div id="header_page_login">
        <p><img src="logos/logoGbaf.jpg" alt="Logo GBAF" /></p>
        <p>Bienvenue sur la page de connexion a l'extranet du Groupement Banque et Assurance Francaise.</p>
    </div>
    <hr>
    <!--    FORMULAIRE DE CONNEXION-->
    <div id="corp_page">
        <div id="connexion">
            <fieldset><strong>CONNEXION</strong>
                <form action="login.php" method="POST">
                    <p><label>username : </label><input type="text" name="nom_utilisateur" /></p>
                    <p><label>password : </label><input type="password" name="mp" /></p>
                    <p><input type="submit" value="Envoyer" /></p>
                    <p><a href="password_lost.php">Mot de passe oublie ?</a></p>
                </form>
            </fieldset>
        </div>

        <!--    FORMULAIRE D'INSCRIPTION-->
        <div id="inscription">
            <fieldset><strong>INSCRIPTION</strong>
                <form action="inscription.php" method="POST">
                    <p><label>prenom : </label><input type="text" name="prenom" /></p>
                    <p><label>nom : </label><input type="text" name="nom" /></p>
                    <p><label>username : </label><input type="text" name="nom_utilisateur" /></p>
                    <p><label> Question : </label>
                        <select name="question">
                            <option>Nom de votre meilleur amis d'enfance ?</option>
                            <option>Dans quelle ville avez-vous grandit ?</option>
                            <option>Nom de votre premiere copine ?</option>
                            <option>Marque de votre premiere voiture ?</option>
                        </select></p>
                    <p><label>reponse : </label><input type="text" name="reponse" /></p>
                    <p><label>password : </label><input type="password" name="mp" /></p>
                    <p><label>password : </label><input type="password" name="mp_verify" /></p>
                    <p><input type="submit" value="Envoyer" /></p>
                </form>
            </fieldset>
        </div>
    </div>

    <!--    Mentions legales et Contact-->
    <footer>
        <p>|Mentions legales|</p>
        <p><a href="contact.php">Contact</a></p>
        <p>|</p>
    </footer>
</body>

</html>

<?php } ?>