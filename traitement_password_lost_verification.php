<?php 

if(!empty($_POST['nom_utilisateur']) && !empty($_POST['reponse'])){
    // CONNEXION A LA BDD
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    session_start();
    
    $username = $_POST['nom_utilisateur'];
    
    $req = $bdd->prepare("SELECT username, question, answer FROM  membre WHERE username = :username && question = :question && answer = :answer ");

    $req->execute(array(
        'username' => $_POST['nom_utilisateur'],
        'question' => $_POST['question'],
        'answer' => $_POST['reponse']
    ));

    $resultat = $req-> fetch();
    // var_dump($resultat);die;

    if(!$resultat){
        echo'Information erronees';
    }else{?>
        <h2>Taper votre nouveau mot de passe et confirmer le :</h2>
        <form action="traitement_password_lost_update.php" method="POST">
        <p><label>username : </label><input type="text" name="nom_utilisateur" /></p>
        <p><label>password : </label><input type="password" name="mp"/></p>
    <p><label>password verify : </label><input type="password" name="mp_verify"/></p>
    <p><input type="submit" value="Envoyer"/></p>
    </form>
    <?php }

}
?>