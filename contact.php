<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Contact GBAF</title>
    <link rel="stylesheet" href="style_contact.css">
</head>

<body>
    <div id="information_contact">
        <h1>Page de contact GBAF</h1>
        <p><strong>Adresse : </strong>133 rue Malraux 75000 Paris</p>
        <p><strong>web : </strong><a href="https://www.globalbankingandfinance.com/">GBAF website</a></p>
        <p><strong>Telephone : </strong>01-12-21-12-21 </p>
        <p><strong>fax : </strong>654-345-567</p>
    </div>

    <div id="contact_message">
        <h2>Vous pouvez nous contacter ici : </h2>
        <form id="formulaire_contact" action="traitement_contact.php" method="POST">
            <p><label>Prenom : </label><input type="text" name="firstname" /></p>
            <p><label>nom : </label><input type="text" name="name" /></p>
            <p><textarea name="commentaire" placeholder="Taper votre message..." cols=10 rows=10></textarea></p>
            <p><input type="submit" value="envoyer" /></p>
        </form>
    </div>
    <p><a href="page_accueil.php">Revenir a la page d'accueil</a></p>

</body>

</html>