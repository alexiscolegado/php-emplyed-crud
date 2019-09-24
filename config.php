<?php 

$databaseHost = "localhost";
$databaseName = "employe";
$databaseUserName = "root";
$databasePassword = "";

try {
    $dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}",$databaseUserName,$databasePassword);

    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo $error->getMessage();
}





?>