<?php

$db_server   = "localhost";
$db_database = "backendprojekt";
$db_username = "root"; 
$db_password = "root";

ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
  $db = new PDO ("mysql:host=$db_server; dbname=$db_database;charset=utf8"
                 ,$db_username
                 ,$db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //echo "success";
}catch(PDOException $e){
  echo "<h2>Error: " . $e-> getMessage() . "</h2>";
}
