<?php
include ("db.class.php");
$host = "localhost";
$user = "root";
$password = "";
$db_name = "site";
try{
    $db = new DB($host, $user, $password, $db_name);
}catch(Exception $e){
    echo $e;
}


?>

