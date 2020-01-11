<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mot de passe perdu</title>
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
        <p>Bienvenu sur la page de connexion préalable à la modification du mot de passe de connexion.</p>
    </div>
    <hr>
    
    <!-- Formulaire perte mot de passe -->
    <div class="container formPassLost">
    <h2>Informations utilisateur :</h2>
        <form action="traitement_password_lost_verification.php" method="POST">
            <div class="form-group">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="nom_utilisateur" class="form-control">
            </div>
            <div class="form-group">
                <label>Question :</label>
                <select name="question" class="form-control">
                    <option>Nom de votre meilleur amis d'enfance ?</option>
                    <option>Dans quelle ville avez-vous grandit ?</option>
                    <option>Nom de votre premiere copine ?</option>
                    <option>Marque de votre premiere voiture ?</option>
                </select></p>
            </div>
            <div class="form-group">
                <label>Réponse :</label>
                <input type="text" name="reponse" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
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