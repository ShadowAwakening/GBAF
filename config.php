<?php
class Config extends PDO {

    const PARAM_host = 'localhost';
    const PARAM_db_name = 'test';
    const PARAM_user = 'root';
    const PARAM_db_pass = '';

public function __construct($options=null){
    parent::__construct('mysql:host='.Config::PARAM_host.';dbname='.Config::PARAM_db_name,
    Config::PARAM_user,
    Config::PARAM_db_pass,$options);
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
