<?php
function renderLikesCard(string $post_id, int $count = 0)
{
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $uid = $_SESSION["data"]["user_id"];
    echo "<button id='like' value='Like ($count)'>";
}
