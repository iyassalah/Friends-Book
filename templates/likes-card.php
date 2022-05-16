<?php
function renderLikesCard(string $post_id, $liked_by_user, int $count = 0)
{
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $uid = $_SESSION["data"]["user_id"];
    $count -= $liked_by_user; // substract so that the "true' count is passed to the function 
    // echo $liked_by_user;
    echo "<button id='like-button" . $post_id . "' onclick='postLike($post_id, $uid, $count)' class='" . ($liked_by_user ? "liked" : "") . "'>";
    $count += $liked_by_user; // readd to display the ACTUAL count to the user which counts in their like
    echo "Like ($count)</button>";
}
