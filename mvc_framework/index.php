<?php
$mysqli = new mysqli('localhost','root','','test_db');

$result = mysqli_query($mysqli,'SELECT * FROM models');

print_r($result);






?>