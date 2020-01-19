<?php

function modification($identifiant, $valeur){

            session_start();
            $id = $_SESSION['id'];
            // CONNEXION A LA BDD
            require "config.php";

            try {
                $bdd = new PDO("mysql:host=$serverName;dbname=$database", $usernameDb, $passDb);
                
                 // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            
            // REQUETE PREPARE : PREPARATION ($req n'est pas une variable mais un objet ...)
           
            $update = $bdd->prepare("UPDATE membre SET $identifiant = :nouvelle_valeur WHERE id = $id");

            $update->execute(array(
                'nouvelle_valeur' => $valeur
            ));
?>
<!-- JAVASCRIPT QUI AFFICHE QUE L'INSCRIPTION C'EST DEROULEE AVEC SUCCEE ET RENVOI A LA PAGE LOGIN -->
<script type="text/javascript">
    alert('Opération réussi, vos données ont bien été modifiée !');
    window.location.href = "page_accueil.php";
</script>

<?php

        }

        if(!empty($_POST['prenom'])){
            modification("firstname", $_POST['prenom']);
        }
        if(!empty($_POST['nom'])){
            modification("name", $_POST['nom']);
        }
        if(!empty($_POST['nom_utilisateur'])){
            modification("username", $_POST['nom_utilisateur']);
        }
        if(!empty($_POST['question'])){
            modification("question", $_POST['question']);
        }
        if(!empty($_POST['reponse'])){
            modification("answer", $_POST['reponse']);
        }
        if(!empty($_POST['mp'])){
            $mp = password_hash($_POST['mp'], PASSWORD_DEFAULT);
            modification("passwords", $mp);
        }
        if(!empty($_POST['mp_verify'])){
            $mp_verify = password_hash($_POST['mp_verify'], PASSWORD_DEFAULT);
            modification("password_verify", $mp_verify);
        }
        

?>
