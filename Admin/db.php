<?php 
/**********************************************
 *       db.php
 *       Skriptet skapar en databasuppkoppling
 *       med PDO (PHP Data Object)
 **********************************************/

ini_set('display_errors', '1');
error_reporting(E_ALL);

$db_server   = "localhost";
$db_database = "backendprojekt";
$db_username = "root";
$db_password = "root";

try{
    $db = new PDO("mysql:host=$db_server;dbname=$db_database;charset=utf8", $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 

}
catch(PDOException $e){
    echo $e-> getMessage();
}