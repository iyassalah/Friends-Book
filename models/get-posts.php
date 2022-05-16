<?php
function getPosts($userId): mysqli_result
{
    require_once('../helpers/db.php');
    $query =
        "SELECT
    users.fname AS fname,
    users.lname AS lname,
    users.image AS user_pfp,
    users.username AS username,
    posts.post_timestamp AS postdate,
    posts.content AS content,
    posts.image AS image,
    like_count.like_count,
    like_count.liked_by_user,
    posts.author_id,    
    posts.post_id
FROM
    posts,
    users,
    (
    SELECT
        COUNT(*) AS `like_count`,
        post_id,
        SUM(CASE WHEN user_id=$userId THEN 1 ELSE 0 END) AS `liked_by_user`
    FROM
        likes
    GROUP BY
        post_id
) AS `like_count`
WHERE
    posts.author_id IN(
    SELECT CASE WHEN
        friendships.friend1_id = $userId THEN friendships.friend2_id WHEN friendships.friend2_id = $userId THEN friendships.friend1_id
END AS friend
FROM
    friendships
WHERE
    (friend1_id = $userId OR friend2_id = $userId) AND accepted = 1
) AND users.user_id = posts.author_id  AND posts.post_id = like_count.post_id;";


    $result = mysqli_query(db(), $query);
    require_once('../templates/post.php');

    return $result;
}
