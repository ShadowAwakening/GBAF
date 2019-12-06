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
                <form action="index.php" method="POST">
                    <p><label>Identifiant : </label><input type="text" name="username" /></p>
                    <p><label>Mot de passe : </label><input type="password" name="password" /></p>
                    <p><label><input type="submit" value="Valider" class="button" /></p>
                </form>
            </fieldset>
        </div>

                            <!--    FORMULAIRE D'INSCRIPTION-->
        <div id="inscription">
            <fieldset><strong>INSCRIPTION</strong>
                <form action="cible.php" method="POST">
                    <p><label> Nom : </label><input type="text" name="nom" /></p>
                    <p><label> Prenom : </label><input type="text" name="prenom" /></p>
                    <p><label>Nom d'utilisateur : </label><input type="text" name="username" /></p>
                    <p><label> Mot de passe : </label><input type="password" name="password" /></p>
                    <p><label> Question : </label>
                        <select name="question">
                            <option selected>Quel etait le nom de votre meilleur amis d'enfance ?</option>
                            <option>Dans quelle ville avez-vous grandit ?</option>
                            <option>Quel etait le nom de votre premiere copine ?</option>
                            <option>Quelle etait la marque de votre premiere voiture ?</option>
                        </select></p>
                    <p><label> Reponse : </label><input type="text" name="reponse" /></p>
                    <p><label><input type="submit" value="Valider" class="button" /></p>
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