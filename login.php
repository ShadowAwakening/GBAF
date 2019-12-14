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
              <form action="page_accueil.php" method="POST">
              <p><label>username : </label><input type="text" name="nom_utilisateur"/></p>
              <p><label>password : </label><input type="password" name="mp"/></p>
              <p><input type="submit" value="Envoyer"/></p>
              <p><a href="password_lost.php">Mot de passe oublie ?</a></p>
              </form>
            </fieldset>
        </div>

                            <!--    FORMULAIRE D'INSCRIPTION-->
        <div id="inscription">
            <fieldset><strong>INSCRIPTION</strong>
              <form action="inscription.php" method="POST">
                 <p><label>prenom : </label><input type="text" name="prenom"/></p>
                 <p><label>nom : </label><input type="text" name="nom"/></p>
                 <p><label>username : </label><input type="text" name="nom_utilisateur"/></p>
                 <p><label> Question : </label>
                     <select name="question">
                         <option>Nom de votre meilleur amis d'enfance ?</option>
                         <option>Dans quelle ville avez-vous grandit ?</option>
                         <option>Nom de votre premiere copine ?</option>
                         <option>Marque de votre premiere voiture ?</option>
                     </select></p>
                 <p><label>reponse : </label><input type="text" name="reponse"/></p>
                 <p><label>password : </label><input type="password" name="mp"/></p>
                 <p><label>password : </label><input type="password" name="mp_verify"/></p>
                 <p><input type="submit" value="Envoyer"/></p>
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
