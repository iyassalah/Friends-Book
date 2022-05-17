<?php
function getPostComments($pid): mysqli_result
{
    require_once('../helpers/db.php');
    $pid = mysqli_real_escape_string(db(), $pid);
    $query = 
    "SELECT
    users.fname AS fname,
    users.lname AS lname,
    users.image AS user_pfp,
    comments.content as content,
    comments.date_added AS date_added
    FROM 
    comments join users ON comments.commenter_id = users.user_id
    WHERE post_id = $pid
    ORDER BY comments.date_added DESC;";
    
    $result = mysqli_query(db(), $query);
    require_once('../templates/comment-card.php');

    return $result;
}