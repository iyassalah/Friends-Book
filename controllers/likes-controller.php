<?php

function check(array $params)
{
    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
            throw new Exception("Missing parameter: $param");
        }
    }
    return true;
}

// print_r($_POST);
header('Content-Type: application/json; charset=utf-8');
try {
    check(["OP", "user_id", "post_id"]);
    $OP = $_POST["OP"];
    $user_id = $_POST["user_id"];
    $post_id = $_POST["post_id"];
    require_once '../models/likes-model.php';
    if ($OP === "ADD") {
        addLike($user_id, $post_id);
    } else if ($OP === "DEL") {
        deleteLike($user_id, $post_id);
    } else {
        throw new Exception("Unknown operation");
    }
    echo json_encode(["success" => true, "user_id" => $user_id, "post_id" => $post_id, "OP" => $OP]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "msg" => $th->getMessage()]);
}

/**
 * THE DATA HAS TO BE SENT IN x-www-form-urlencoded
 */
