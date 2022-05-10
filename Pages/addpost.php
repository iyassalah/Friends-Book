<?php
if (isset($_POST['uid']) && isset($_POST['content'])) {
    $uid = $_POST['uid'];
    $content = $_POST['content'];
    require_once '../models/add-post.php';
    if (addPost($uid, $content)) {
        echo json_encode(["success" => true, "msg" => "post created"]);
    } else {

        echo json_encode(["success" => false, "msg" => "post post creation failed"]);
    }
}

header("Location: /homepage.php");