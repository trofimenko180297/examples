<?php
session_start();
require_once ("../lib/model.class.php");
require_once ("../lib/user.class.php");
require_once ("../lib/password.class.php");
//require_once ("../model/request.model.php");
require_once ("../lib/session.class.php");

if ($_POST){
    $login_user = new Login($_POST);

    if ($login_user->validation()){
    $password = new Password($db->escape($login_user->getPassword()));
    $token = $db->escape($login_user->getToken());
    $login = $db->escape($login_user->getLogin());

        $result = $db->query("SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'");
    if(!$result){
        echo (json_encode(array("Error_message" => "Login or password not match!")));
        http_response_code(400);
    }else{
        if ($_SERVER['HTTP_USER_AGENT'] == "Mobile") {
            $set_token = $db->query("UPDATE users SET `token` = '{$token}' WHERE login = '{$login}'");
            echo (json_encode(array("Token" => $token)));
            http_response_code(200);
        }else {
            $get_id_user = $db->query("SELECT id FROM users WHERE login = '{$login}'");
            Session::set("user_id", $get_id_user[0]["id"]);
            $get_user = $db->query("SELECT email FROM users WHERE login = '{$login}'");
            Session::set("email", $get_user[0]["email"]);
            $get_user = $db->query("SELECT birth FROM users WHERE login = '{$login}'");
            Session::set("birth", $get_user[0]["birth"]);
            Session::set("user", $login);
            http_response_code(200);
        }
    }
    }else{
        echo (json_encode(array("Error_message" => "Empty fields")));
        http_response_code(400);
    }
}
?>