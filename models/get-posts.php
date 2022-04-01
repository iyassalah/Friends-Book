<?php
function getPosts($userId): mysqli_result
{
    require('../helpers/db.php');
    $query =
        "SELECT
    users.fname AS fname,
    users.lname AS lname,
    users.image AS user_pfp,
    users.username AS username,
    posts.post_timestamp AS postdate,
    posts.content AS content,
    posts.image AS image
FROM
    posts,
    users
WHERE
    posts.author_id IN(
    SELECT CASE WHEN
        friendships.friend1_id = $userId THEN friendships.friend2_id WHEN friendships.friend2_id = $userId THEN friendships.friend1_id
END AS friend
FROM
    friendships
WHERE
    friend1_id = $userId OR friend2_id = $userId
) AND users.user_id = posts.author_id;";


    $result = mysqli_query(db(), $query);
    require('../templates/post.php');

    return $result;
}
