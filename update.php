<?php 

session_start();

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Update Account</title>
  <link rel="stylesheet" href="update.css">
</head>
<body>

                        <!-- HEADER -->
<?php include "header.php"?>

<hr/>

                        <!-- TABLEAU -->
    <table>
    <caption>Informations actuelles</caption>

    <tr>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Username</th>
        <th>Question</th>
        <th>Reponse</th>
        <th>Mot de passe</th>
        <th>Mot de passe</th>
    </tr>
    <tr>
        <td><?php echo $_SESSION['prenom']; ?></td>
        <td><?php echo $_SESSION['nom']; ?></td>
        <td><?php echo $_SESSION['username']; ?></td>
        <td><?php echo $_SESSION['question']; ?></td>
        <td><?php echo $_SESSION['answer']; ?></td>
        <td><?php echo $_SESSION['password']; ?></td>
        <td><?php echo $_SESSION['password_verify']; ?></td>
    </tr>
    </table>

    <hr/>

    <!-- CORP DE PAGE -->
    <p class='consigne'>Utiliser le formulaire ci-dessous si vous voulez modifier vos informations :</p>

    <form action="traitement_update.php" method="POST">
    <p><label>prenom : </label><input type="text" name="prenom"/></p>
    <p><label>nom : </label><input type="text" name="nom"/></p>
    <p><label>username : </label><input type="text" name="nom_utilisateur"/></p>
    <p><label> Question : </label>
        <select name="question">
            <option>Nom de Votre meilleur amis d'enfance ?</option>
            <option>Dans quelle ville avez-vous grandit ?</option>
            <option>Nom de votre premiere copine ?</option>
            <option>Marque de votre premiere voiture ?</option>
        </select></p>
    <p><label>reponse : </label><input type="text" name="reponse"/></p>
    <p><label>New password : </label><input type="password" name="mp"/></p>
    <p><label>New password confirmation : </label><input type="password" name="mp_verify"/></p>
    <p><input type="submit" value="Envoyer"/></p>

    <hr/>
    <!-- LIEN POUR REVENIR A L'ACCUEIL -->
    <p><a href="page_accueil.php">Revenir a la page d'accueil</a></p>

</body>
</html>