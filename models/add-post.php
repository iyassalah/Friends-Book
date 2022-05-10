<?php

function addPost(string $uid, string $content)
{
    require_once('../helpers/db.php');
    $result = mysqli_query(db(), "INSERT INTO posts (`author_id`, `content`) VALUES ('$uid', '$content');");
    return boolval($result);
}