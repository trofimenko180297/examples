<?php
require_once ("../lib/model.class.php");
require_once ("../lib/user.class.php");

$user_data = new User_data();

if ($_SERVER['HTTP_USER_AGENT'] = 'Mobile') {
    $headers = getallheaders();
    if (isset($headers['authorization'])) {
        $token = $db->escape($headers['authorization']);
        try{
        $user = $db->query("SELECT id, login, birth, email FROM users WHERE token = '{$token}'");
        }catch (Exception $e){
            echo(json_encode(array("Error_message" => $e->getMessage())));
            http_response_code(400);
        }
        if ($user) {
            $user_data->setParam($user);
            echo(json_encode($user_data->getParam()));
            http_response_code(200);
        } else {
            echo(json_encode(array("Error_message" => "Access denied!")));
            http_response_code(400);
        }
    } else {
        http_response_code(400);
    }
}
?>

