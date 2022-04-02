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
