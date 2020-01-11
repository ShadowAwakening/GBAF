<?php 

session_start();

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modification des données utilisateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- HEADER -->
    <?php include "header.php"?>

    <hr /> 

    <table class="table table-bordered">
  <thead>
    <tr class="table-info">
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Nom d'utilisateur</th>
      <th scope="col">Question</th>
      <th scope="col">Réponse</th>

    </tr>
  </thead>
  <tbody>
    <tr class="table-donnees">
      <td><?= $_SESSION['prenom']; ?></td>
      <td><?= $_SESSION['nom']; ?></td>
      <td><?= $_SESSION['username']; ?></td>
      <td><?= $_SESSION['question']; ?></td>
      <td><?= $_SESSION['answer']; ?></td>
    </tr>
  </tbody>
</table>
 
    <hr />

<!-- Formulaire de modification d'information -->
        <div class="container formLog">
        <h2>Modification informations :</h2>
        <form action="traitement_update.php" method="POST">
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
                        <option>Marque de votre premiere voiture ?</option>
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
            <button type="submit" class="btn btn-primary">Modifier</button>
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
