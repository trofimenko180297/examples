<?php
session_start();
require_once ("../lib/session.class.php");
require_once ("../lib/request.class.php");
require_once ("../lib/model.class.php");

$request_data = new Request($_GET);

if ($_GET){
        $id = $db->escape($request_data->getId());
        $param = $db->escape($request_data->getParams());
        $res = array();

    if ($_SERVER['HTTP_USER_AGENT'] == "Mobile"){
        $headers = getallheaders();
        if (isset($headers['authorization'])){
            $token = $db->escape($headers['authorization']);
            $token_id = $db->query("SELECT users.id FROM users WHERE token = '{$token}'");
            if (isset($token_id[0]["id"])) {
                $user_id = $db->escape($token_id[0]["id"]);
            }else{
                $user_id = null;
            }
        }else{
            http_response_code(400);
        }
    }else{
        $user_id = $db->escape(Session::get("user_id"));
    }
        $get_user = $db->query("SELECT user_id FROM device WHERE id = '{$id}'");
    if (!empty($get_user[0]['user_id']) && $get_user[0]['user_id'] == $user_id) {
        if ($request_data->getParams() !== null && $request_data->getId() !== null) {
            try {
                $res = $db->query("SELECT device.id, {$param}.data AS {$param}_data,{$param}.date as {$param}_date FROM device left join {$param} on device.id = {$param}.ssid WHERE device.id = '{$id}'");
                echo(json_encode($res));
                http_response_code(200);
            } catch (Exception $e) {
                echo(json_encode(array("Error_message" => $e->getMessage())));
                http_response_code(400);
            }
        } elseif ($request_data->getId() !== null) {
            try {
                $res = $db->query("SELECT device.id, temp.data AS \"temp\",temp.date as \"temp_date\",pressure.data AS \"pressure\",pressure.date AS \"pressure_date\",humid.data AS \"humid\",humid.date AS \"humid_date\",co2.data as \"co2\",co2.date AS \"co2_date\",altitude.data AS \"altitude\",altitude.date AS \"altitude_date\" FROM device left join temp on device.id = temp.ssid left join pressure on device.id = pressure.ssid LEFT JOIN humid ON device.id = humid.ssid LEFT JOIN co2 ON device.id = co2.ssid LEFT JOIN altitude ON device.id = altitude.ssid WHERE device.id = '{$id}' order by temp.date desc,pressure.date DESC,humid.date DESC, co2.date desc LIMIT 1");
                echo(json_encode($res));
                http_response_code(200);
            }catch (Exception $e){
                echo(json_encode(array("Error_message" => $e->getMessage())));
                http_response_code(400);
            }
        }
    }elseif ($request_data->getId() == null && $request_data->getParams()) {
        try {
            $res = $db->query("SELECT device.id, {$param}.data AS {$param}_data, {$param}.date as {$param}_date FROM device left join {$param} on device.id = {$param}.ssid WHERE device.user_id = '{$user_id}'");
            echo(json_encode($res));
            http_response_code(200);
        }catch (Exception $e){
            echo(json_encode(array("Error_message" => $e->getMessage())));
            http_response_code(400);
        }
    }elseif ($request_data->getId() == null && !empty($user_id)) {
        try {
            $res = $db->query("SELECT device.id, device.name, device.status FROM device WHERE user_id = '{$user_id}'");
            echo(json_encode($res));
            http_response_code(200);
        }catch (Exception $e){
            echo(json_encode(array("Error_message" => $e->getMessage())));
            http_response_code(400);
        }
    }else{
        echo(json_encode(array("Error_message" => "Access denied for device!")));
        http_response_code(400);
    }
}

