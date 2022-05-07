<?php

function friendController()
{
    try {
        $friend1_id = $_POST['friend1_id'];
        $friend2_id = $_POST['friend2_id'];
        $acc = $_POST['acc'];
        require_once '../models/confirm-friend-request.php';
        header('Content-Type: application/json; charset=utf-8');
        if ($acc) {
            if (acceptFriend($friend1_id, $friend2_id)) {
                echo json_encode(["ok" => true]);
            } else {
                throw new Exception("Database error");
            }
        } else {
            if (deleteFriend($friend1_id, $friend2_id)) {
                echo json_encode(["ok" => true]);
            } else {
                throw new Exception("Database error");
            }
        }
    } catch (\Throwable $th) {
        echo json_encode(["ok" => false, "error" => $th->getMessage()]);
    }
}
