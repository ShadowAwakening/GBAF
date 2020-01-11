<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Contact GBAF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div id="header_page_login"> 
        <p><img src="logos/logoGbaf.jpg" alt="Logo GBAF" /></p>
        <p>Bienvenue sur la page de contact du Groupement Banque et Assurance Francaise.</p>
    </div>
    <hr>

<!-- Information de contact GBAF -->
    <div class="container infosContact">
    <h2>Informations de contact GBAF :</h2>
        <p class="text-center"><strong>Adresse</strong> : 133 rue Malraux 75000 Paris</p>
        <p class="text-center"><strong>web</strong> : <a href="https://www.globalbankingandfinance.com/">GBAF website</a></p>
        <p class="text-center"><strong>Téléphone</strong> : 01-12-21-12-21 </p>
        <p class="text-center"><strong>fax</strong> : 654-345-567</p>
    </div>

<!-- Formulaire de contact GBAF -->

    <div class="container infosContact">
    <h2>Formulaire de contact :</h2>
        <form>
            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Message :</label>
                <textarea class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

<!-- Lien de retour a la page de login -->
    <div class="container infosContact">
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