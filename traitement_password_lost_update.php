
<!-- 
if(!empty($_POST['nom_utilisateur']) && !empty($_POST['mp']) && !empty($_POST['mp_verify'])){
    // CONNEXION A LA BDD
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $username = $_POST['nom_utilisateur'];

    $update = $bdd->prepare("UPDATE membre SET password = :nouveau_mp && password_verify = nouveau_mp_verify WHERE username = :username");
    var_dump($update);die;

    $update->execute(array(
        'username' => $_POST['nom_utilisateur'],
        'nouveau_mp' => $_POST['mp'],
        'nouveau_mp_verify' => $_POST['mp_verify']
    ));
}else{
    echo'veuillez remplir les 3 champs';
} -->

<?php

function modification($identifiant, $valeur){

            $username = $_POST['nom_utilisateur'];
            // CONNEXION A LA BDD
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            
            // REQUETE PREPARE : PREPARATION ($req n'est pas une variable mais un objet ...)
           
            $update = $bdd->prepare("UPDATE membre SET $identifiant = :nouvelle_valeur WHERE username = $username");
            // var_dump($update);die;

            $update->execute(array(
                'nouvelle_valeur' => $valeur
            ));
            // var_dump($update);die;
?>
            <!-- JAVASCRIPT QUI AFFICHE QUE L'INSCRIPTION C'EST DEROULEE AVEC SUCCEE ET RENVOI A LA PAGE LOGIN -->
            <script type="text/javascript"> alert('Operation reussi, vos donnees on bien ete modifie !');
            window.location.href="login.php";
            </script>

<?php

        }

        if(!empty($_POST['mp'])){
            // $mp = password_hash($_POST['mp'], PASSWORD_DEFAULT);
            modification("password", $_POST['mp']);
        }else{
            echo'case vide';
        }
        if(!empty($_POST['mp_verify'])){
            // $mp_verify = password_hash($_POST['mp_verify'], PASSWORD_DEFAULT);
            modification("password_verify", $_POST['mp_verify']);
        }else{
            echo'case vide';
        }

?>
