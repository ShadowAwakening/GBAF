<?php
require "constante.php";

class Config extends PDO {


public function __construct($options=null){
    parent::__construct('mysql:host='.PARAM_host.';dbname='.PARAM_db_name,
    PARAM_user,
    PARAM_db_pass,$options);
}
public function Connection(){

    try {
        $connect = new PDO("mysql:host=$serverName;dbname=$dataBase", $userNameDb, $passDb);

    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    $this->bdd = $connect;
}

public function getConnection(){
    $bdd = $this->bdd;
    return $bdd;

}

}
