<?php
require_once ("../lib/alarm.class.php");
require_once ("../lib/model.class.php");



if ($_POST) {
    for ($i=1; $i<=count($_POST); $i++) {
        $alarm = new Alarm($_POST);
        if ($alarm->validate()) {
            $id = $db->escape($alarm->getId());
            $param = $db->escape($alarm->getParam());
            $date = $db->escape($alarm->getDate());
            $data = $db->escape($alarm->getData());

            if ($id !== null) {
                try {
                    $res = $db->query("INSERT INTO {$param} (ssid, date, data) VALUES ('{$id}','{$date}', '{$data}')");
                    unset($_POST["$param"]);
                    http_response_code(200);
                } catch (Exception $e) {
                    echo(json_encode(array("Error_message" => $e->getMessage())));
                    http_response_code(400);
                }
            } else {
                http_response_code(404);
            }
        } else {
            http_response_code(404);
        }
    }

}


?>