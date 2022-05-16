<?php

// print_r($_POST);
header('Content-Type: application/json; charset=utf-8');
try {
    if (!(isset($_POST["sender"]) && isset($_POST["recipient"]))) {
        throw new Exception("Not enough paramters");
    }
    $sender = $_POST['sender'];
    $recipient = $_POST['recipient'];
    require_once '../models/send-message.php';
    if ($result = getMessages($sender, $recipient)) {
        echo json_encode(["success" => true, "data" => $result]);
    } else {
        echo json_encode(["success" => false, "msg" => "No messages"]);
    }
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "msg" => $th->getMessage()]);
}

/**
 * THE DATA HAS TO BE SENT IN x-www-form-urlencoded
 */