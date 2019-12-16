<?php

function modification($identifiant, $valeur){

            session_start();
            $id = $_SESSION['id'];
            // CONNEXION A LA BDD
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
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
            <script type="text/javascript"> alert('Operation reussi, vos donnees on bien ete modifie !');
            window.location.href="page_commentaire_acteur.php?";
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
            modification("password", $mp);
        }
        if(!empty($_POST['mp_verify'])){
            $mp_verify = password_hash($_POST['mp_verify'], PASSWORD_DEFAULT);
            modification("password_verify", $mp_verify);
        }
        

?>
