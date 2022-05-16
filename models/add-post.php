<?php

function addPost(string $uid, string $content)
{
    require_once('../helpers/db.php');
    $uid = mysqli_real_escape_string(db(), $uid);
    $content = mysqli_real_escape_string(db(), $content);
    $content = htmlspecialchars($content);
    $result = mysqli_query(db(), "INSERT INTO posts (`author_id`, `content`) VALUES ('$uid', '$content');");
    return boolval($result);
}