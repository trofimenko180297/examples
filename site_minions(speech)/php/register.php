<?php
include ("form.class.php");
$register = new Register($_POST);
$data = array();
$ok = false;
if($_POST){
    $login = $db->escape($register->getLogin());
    $user = $db->escape($register->getUser());
    $email = $db->escape($register->getEmail());
    $password = $db->escape($register->getPassword());

    $result = $db->query("SELECT * FROM user WHERE login = '{$login}'");
    $result_email = $db->query("SELECT * FROM user WHERE email = '{$email}'");

    if(!$result && !$result_email){
        $msg = "Ви успішно зареєстровані на сайті!";
        $db->query("INSERT INTO user (login, name, email, password) VALUES ('{$login}', '{$user}', '{$email}', '{$password}')");
        $ok = true;
    }elseif ($result){
        $msg = "Введений вами логін зайнятий!";
    }else{
        $msg = "Введена вами ел.пошта уже використовується!";
    }
}
?>