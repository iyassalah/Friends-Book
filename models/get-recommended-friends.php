<?php
function getRecommendedFriends(string $uid)
{
    $query =
        "SELECT
    fname, lname, username, user_id, image
FROM
    users
WHERE
    users.user_id NOT IN(
    SELECT CASE WHEN
        friendships.friend1_id = $uid THEN friendships.friend2_id WHEN friendships.friend2_id = $uid THEN friendships.friend1_id
END
FROM
    friendships
WHERE
    friend1_id = $uid OR friend2_id = $uid
) AND users.user_id != $uid;";
    require_once('../helpers/db.php');
    $result = mysqli_query(db(), $query);
    if ($result)
    {
        return $result;
    }
}
