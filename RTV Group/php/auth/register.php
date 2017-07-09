<?php
require_once ("../lib/user.class.php");
require_once ("../lib/password.class.php");
require_once ("../lib/model.class.php");
$register = new Registration($_POST);

if($_POST){
    if ($register->validation()){
    $login = $db->escape($register->getLogin());
    $email = $db->escape($register->getEmail());
    $birth = $db->escape($register->getBirth());
    $password = new Password($db->escape($register->getPassword()));

        try {
            $result = $db->query("SELECT * FROM users WHERE login = '{$login}' OR email = '{$email}'");
        }catch (Exception $e){
            echo(json_encode(array("Error_message" => $e->getMessage())));
            http_response_code(400);
        }

    if (!$result){
        try {
            $db->query("INSERT INTO users (login, email, birth, password) VALUES ('{$login}', '{$email}', '{$birth}', '{$password}')");
        }catch (Exception $e){
            echo(json_encode(array("Error_message" => $e->getMessage())));
            http_response_code(400);
        }
        echo (json_encode(array("Message" => "Success!")));
        http_response_code(200);
    }else{
        echo (json_encode(array("Error_message" => "User already exist!")));
        http_response_code(400);
    }
    }else{
        echo (json_encode(array("Error_message" => "Empty fields")));
        http_response_code(400);
    }
}

?>