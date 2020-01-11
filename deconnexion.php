<?php 

//Detruit toutes les variables de session   
$_SESSION = array();

// Efface le cookie de session ce qui a pour effet de detruir toute la session et pas seulement les donnees de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Detruit la session
    session_destroy();
    header("location:login.php");
?>