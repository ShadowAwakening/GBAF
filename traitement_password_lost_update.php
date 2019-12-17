<?php

if (isset($_POST['nom_utilisateur']) && isset($_POST['mp']) && isset($_POST['mp_verify']) && !empty($_POST['nom_utilisateur']) && !empty($_POST['mp'] && !empty($_POST['mp_verify']))) {

    // Verifie que les password soit bien les meme
    if ($_POST['mp'] == $_POST['mp_verify']) {


        // ESSAIE DE SE CONNECTER A LA BDD
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

            // STOP LE PROCESSUS ET AFFICHE L'ERREUR S'IL Y A UN PBLM DE CONNEXION A LA BDD
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

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
                alert('Operation reussi, vos donnees on bien ete modifie !');
                window.location.href = "login.php";
            </script>

<?php
            // header('Location: login.php');
        } else {
            echo 'Utilisateur inconnu !';
        }
    } else {
        echo 'Vos mot de passe ne correspondent pas. Reesayer';
    }
} else {
    echo 'manque information';
}

?>