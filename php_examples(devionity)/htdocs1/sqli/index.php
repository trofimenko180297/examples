
<?php
include_once("sqli.php");

$db_host = 'localhost';
$db_user = 'Vitalik';
$password = '00vitalik1897';
$db_name = 'users';

try{
	
	$db = new DB($db_host, $db_user, $password, $db_name);
    
	$db->query('DELETE FROM user WHERE login = "trofim" ');
	
	echo '<pre>';
    print_r($db->query('SELECT * FROM user'));  
    echo '</pre>';
   
   
   
   
   }catch(Exeption $e){
	   echo $e->getMessage();
   }











?>