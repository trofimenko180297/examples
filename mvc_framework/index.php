<?php
$mysqli = new mysqli('localhost','root','','php-academy');

$result = mysqli_query($mysqli,'SELECT * FROM models');

print_r($result);






?>