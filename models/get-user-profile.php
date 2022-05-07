<?php
function getUserProfile(string $uid)
{
    require_once '../templates/error-message.php';
    $query = "SELECT * FROM `users` WHERE user_id = $uid;";
    // echo $query;
    require_once '../helpers/db.php';
    $result = null;
    try {
        $result = mysqli_query(db(), $query);
        return mysqli_fetch_assoc($result);
    } catch (\Throwable $th) {
        showError("data base error");
        throw $th;
    }
}


function getUserPosts(string $uid)
{
    require_once '../templates/error-message.php';
    $query = "SELECT * FROM `posts` WHERE author_id = $uid;";
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
