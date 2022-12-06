<?php
/**
 * @file dbConnector.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 02.12.2022
 */
function openDBConnexion(){
    $tempDBConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'leakcode';
    $userName = 'admin_leakcode';
    $userPwd = 'Pa$$w0rd';
    $dns = $sqlDriver.'host='.$hostname.';dbname='.$dbName.';port='.$port.';charset='.$charset;

    try{
        $tempDBConnexion = new PDO ($dns, $userName, $userPwd);
    }
    catch (PDOException $exception){
        echo 'Connexion failed'.$exception->getMessage();
    }
    return $tempDBConnexion;
}

//function to execute query Select
function executeQuerySelect($query){
    $queryResult = null;
    $dbConnection = openDBConnexion(); // Ouvre la connexion à la BD
    if ($dbConnection != null){
        $statement = $dbConnection->prepare($query);                // preparation de la requete
        $statement->execute();                                    // execution de la requete
        $queryResult = $statement->fetchAll();                      //prépare les résultats de la requête pour le client
    }
    $dbConnection = null; // fermeture de la connexion à la DB
    return $queryResult;
}


