<?php

// print_r($_POST);
header('Content-Type: application/json; charset=utf-8');
try {
    if (!(isset($_POST["sender"]) && isset($_POST["recipient"]) && isset($_POST["content"]))) {
        throw new Exception("Not enough paramters");
    }
    $sender = $_POST['sender'];
    $recipient = $_POST['recipient'];
    $content = $_POST['content'];
    require_once '../models/send-message.php';
    $id = addMessage($sender, $recipient, $content);
    echo json_encode(["success" => true, "content" => $content, "msg_id" => $id]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "msg" => $th->getMessage()]);
}

/**
 * THE DATA HAS TO BE SENT IN x-www-form-urlencoded
 */
