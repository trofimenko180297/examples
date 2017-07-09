<?php

$count_1=isset($_COOKIE['count'])?(int)$_COOKIE['count']:0;
$count_1++;


setcookie('count', $count_1, time()+60*60*7);


echo $count_1;


?>