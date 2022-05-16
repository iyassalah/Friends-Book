<?php
function getUserProfile(string $uid)
{
    require_once '../templates/error-message.php';
    require_once '../helpers/db.php';
    $uid = mysqli_real_escape_string(db(), $uid);
    $query = "SELECT * FROM `users` WHERE user_id = $uid;";
    // echo $query;
    $result = null;
    try {
        $result = mysqli_query(db(), $query);
        return mysqli_fetch_assoc($result);
    } catch (\Throwable $th) {
        showError("Datebase error");
        throw $th;
    }
}

function getUserPublicInfo(string $uid)
{
    require_once '../templates/error-message.php';
    require_once '../helpers/db.php';
    $uid = mysqli_real_escape_string(db(), $uid);
    $query = "SELECT `user_id`, `email`, `username`,
    `phone`, `date_joined`,
    `address`, `gender`, `fname`,
    `lname`, `image` FROM `users` WHERE user_id = $uid;";
    // echo $query;
    $result = null;
    try {
        $result = mysqli_query(db(), $query);
        return mysqli_fetch_assoc($result);
    } catch (\Throwable $th) {
        showError("Datebase error");
        throw $th;
    }
}

function getUserPosts(string $uid)
{
    require_once '../templates/error-message.php';
    $query =
        "SELECT
users.fname AS fname,
users.lname AS lname,
users.image AS user_pfp,
users.username AS username,
posts.post_timestamp AS postdate,
posts.content AS content,
posts.image AS image,
posts.author_id AS author_id,
posts.post_id AS post_id
FROM
posts,
users
WHERE $uid = posts.author_id AND users.user_id = $uid;";
    // second clause needed to prevent cartesian product


    // echo $query;
    require_once '../helpers/db.php';
    $result = null;
    try {
        $result = mysqli_query(db(), $query);
        if (!$result) {
            throw new Exception('query failed');
        }
        return $result;
    } catch (\Throwable $th) {
        showError("data base error");
        throw $th;
    }
}
