<?php

$dsn = 'mysql:host=localhost; dbname=test';
$user = 'root';
$password = '';

try{
	$database = new PDO($dsn, $user, $password);
	//var_dump($database);
} catch(PDOException $e){
	echo $e->getMessage();
}
	
$data_mysql = $database->prepare('SELECT name FROM student WHERE name = :name');
$data_mysql->execute( array('name' => 'Vitalik'));
$student = $data_mysql->fetchALL(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($student);
echo '</pre>';	
	





?>