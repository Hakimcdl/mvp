<?php
function getPdoLink($config){
    //DSN signifie data Source Name
    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';port=' . $config['port'];
    try {
        $connexion = new PDO ($dsn, $config['username'], $config['password']);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $exception) {
        echo 'Échec lors de la connexion : ' . $exception->getMessage();
    }
}