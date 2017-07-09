<?php
session_start();
include ("form.class.php");
require_once 'session.class.php';
$login = new Login($_POST);

if($_POST){
    $password = $db->escape($login->getPassword());
    $login = $db->escape($login->getLogin());

    $result = $db->query("SELECT * FROM user WHERE login = '{$login}' AND password = '{$password}'");

    if(!$result){
        $msg = "User not found";
        return false;
    }else{
        Session::set('user', $login);
        header('location:../index.php');
    }
}