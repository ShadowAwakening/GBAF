<?php

// VERIFIE SI LES CHAMPS SONT PRESENT LORS DE L'ENVOI
if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['nom_utilisateur']) && isset($_POST['question']) && isset($_POST['reponse']) && isset($_POST['mp']) && isset($_POST['mp_verify'])) {

// VERIFIE QUE LES CHAMPS SOIT TOUS REMPLIENT
    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['nom_utilisateur']) && !empty($_POST['question']) && !empty($_POST['reponse']) && !empty($_POST['mp']) && !empty($_POST['mp_verify'])) {

        // VERIFIE QUE LES 2 MOT DE PASSE CORRESPONDENT BIEN
        if($_POST['mp'] === $_POST['mp_verify']) {

            // ESSAIE DE SE CONNECTER A LA BDD
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

            // STOP LE PROCESSUS ET AFFICHE L'ERREUR S'IL Y A UN PBLM DE CONNEXION A LA BDD
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            // STOCK LES DONNEES ENVOYEES PAR LE FORMULAIRE DANS DES VARIABLES APPROPRIEES ET SECURISE LES DONNEES GRACE A LA FONCTION HTMLSPECIALCHARS
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
            $question = htmlspecialchars($_POST['question']);
            $reponse = htmlspecialchars($_POST['reponse']);
            // HASH LES PASSWORDS
            $mp = password_hash($_POST['mp'], PASSWORD_DEFAULT);
            $mp_verify = password_hash($_POST['mp_verify'], PASSWORD_DEFAULT);

            // REQUETE PREPARE : PREPARATION
            $req = $bdd->prepare("INSERT INTO membre (firstname, name, username, question, answer, passwords, password_verify) VALUES (:firstname, :name, :username, :question, :answer, :passwords,:password_verify)");

            // EXECUTION GRACE A UN ARRAY
            $req->execute(array(
                'firstname' => $prenom,
                'name' => $nom,
                'username' => $nom_utilisateur,
                'question' => $question,
                'answer' => $reponse,
                'passwords' => $mp,
                'password_verify' => $mp_verify
            ));

            // FERMETURE DE LA VARIABLE DE REQUETE
            $req->closeCursor();
?>
            <!-- JAVASCRIPT QUI AFFICHE QUE L'INSCRIPTION C'EST DEROULEE AVEC SUCCEE ET RENVOI A LA PAGE LOGIN -->
            <script type="text/javascript"> alert('Inscription reussi ! Cliquer sur ok pour revenir sur la page de connexion :');
            window.location.href="login.php";
            </script>

<?php
        }else{?>
            <p>Vos mot de passe ne correspondent pas, Veuillez vous enregistrer de nouveau.</p>
            <a href="login.php"> Retour a la page de connexion</a>

        <?php }
    }else{
        echo 'veuillez remplir tout les champs';
    }
} else {
    echo 'veuillez remplir tout les champs';
}
?>
