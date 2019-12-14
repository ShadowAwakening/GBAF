<?php 

// DECONNECT L'USER PUIS LE RENVOI A LA PAGE DE LOGIN
    session_destroy();
    header("location:login.php");
?>