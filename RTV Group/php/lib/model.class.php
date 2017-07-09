<?php
require_once ("config.class.php");
require_once ("db.class.php");

try{
    $db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.name'));
}catch(Exception $e){
    echo $e;
}

?>