<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <form action="traitement_password_lost_verification.php" method="POST">
        <p><label>username : </label><input type="text" name="nom_utilisateur" /></p>
        <p><label> Question : </label>
            <select name="question">
                <option>Nom de votre meilleur amis d'enfance ?</option>
                <option>Dans quelle ville avez-vous grandit ?</option>
                <option>Nom de votre premiere copine ?</option>
                <option>Marque de votre premiere voiture ?</option>
            </select></p>
            <p><label>Reponse : </label><input type="text" name="reponse" /></p>
        <p><input type="submit" value="Envoyer" /></p>
    </form>
</body>

</html>