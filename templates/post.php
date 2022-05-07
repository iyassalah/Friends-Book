<?php
function showPost(array $postData)
{
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ['fname' => $fname, 'lname' => $lname, 'content' => $content, 'postdate' => $date, 'author_id' => $uid, 'post_id' => $post_id] = $postData;
    echo "<div class='post'>";
    echo "<span class='username'> $fname $lname </span>";
    echo "<span class='dateposted'>on $date</span>";
    if ($uid === $_SESSION["data"]["user_id"]) {
        echo '<form action="../deletepost.php" method="post">';
        echo '<input name="id" id="id" type="hidden" value="' . $post_id . '" />';
        echo '<input type="submit" value="Delete" />';
        echo '</form>';
    }
    echo "<p>$content</p>";
    echo "</div>";
}
