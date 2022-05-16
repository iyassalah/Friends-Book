<?php

function getFriends(string $uid)
{
    require_once('../helpers/db.php');
    $query =
        "SELECT
        fname,
        lname,
        username,
        user_id,
        image,
        accepted
    FROM
        users,
        friendships
    WHERE
        users.user_id = friendships.friend1_id AND friendships.friend2_id = $uid 
    OR users.user_id = friendships.friend2_id AND friendships.friend1_id = $uid;";

    $result = mysqli_query(db(), $query);

    if (!$result) {
        throw new Exception('Database error');
    }

    return $result;
}
