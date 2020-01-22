<?php

if (isset($_POST['nom_utilisateur']) && isset($_POST['mp']) && isset($_POST['mp_verify']) && !empty($_POST['nom_utilisateur']) && !empty($_POST['mp'] && !empty($_POST['mp_verify']))) {

    // Verifie que les password soit bien les meme
    if ($_POST['mp'] == $_POST['mp_verify']) {


// CONNEXION A LA BDD
require "config.php";
$bdd = new Config();

        $username = htmlspecialchars($_POST['nom_utilisateur']);
        $mp = password_hash($_POST['mp'], PASSWORD_DEFAULT);
        $mp_verify = password_hash($_POST['mp_verify'], PASSWORD_DEFAULT);

        $check = $bdd->prepare("SELECT * FROM membre WHERE username = ?");
        $check->execute(array($username));

        $isexist = ($check->fetch());
        $id = $isexist['id'];

        if ($isexist) {
            $update = $bdd->prepare("UPDATE membre SET passwords = :nouvelle_valeur, password_verify = :nouvelle_valeur_passvery WHERE id = $id");

            $update->execute(array(
                'nouvelle_valeur' => $mp,
                'nouvelle_valeur_passvery' => $mp_verify
            ));

?>
<!-- JAVASCRIPT QUI AFFICHE QUE L'INSCRIPTION C'EST DEROULEE AVEC SUCCEE ET RENVOI A LA PAGE LOGIN -->
<script type="text/javascript">
    alert('Opération réussi, vos données ont bien été modifiée !');
    window.location.href = "login.php";
</script>

<?php
            // header('Location: login.php');
        } else {
            echo 'Utilisateur inconnu !';
        }
    } else {?>
<p>Vos mot de passe ne correspondent pas entre eux ... </p>
<a href="password_lost.php">Retour a la page precedente</a>
<?php }
} else {
    echo 'Manque informations';
}

?>