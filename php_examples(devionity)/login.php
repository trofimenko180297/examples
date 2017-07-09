<?php
include ("form.class.php");

$login = new Login($_POST);

if($_POST){
    $login = $db->escape($login->getLogin());
    $password = $db->escape($login->getPassword());

    $result = $db->query("SELECT * FROM user WHERE login = '{$login}' AND password = '{$password}'");

    if(!$result){
        $msg = "User not found";
    }else{
        
    }
}