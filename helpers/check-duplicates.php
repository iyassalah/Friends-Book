<?php
/**
 * returns true if a duplicate exists
 */
function checkDuplicate(string $username, string $email): bool
{
    $query = "SELECT COUNT(*) AS dupe FROM `users` WHERE users.email = '$email' OR users.username = '$username';";
    // echo $query;
    require_once '../helpers/db.php';
    $result = mysqli_query(db(), $query);
    $count = mysqli_fetch_assoc($result)["dupe"];
    return $count > 0;
}
