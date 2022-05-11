<?php
function showPost(array $postData)
{
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ['fname' => $fname, 'lname' => $lname, 'content' => $content, 'postdate' => $date, 'author_id' => $uid, 'post_id' => $post_id] = $postData;
    echo "<div class='d-flex flex-column rounded-border card-body dark-card'>";
    echo "<div class='d-flex flex-row justify-content-between text-center'>";
    echo "<span><h5 class='card-title pfont heading-color'> $fname $lname </h5></span>";
    echo "<span class='card-subtitle mb-2 text-muted small-font pfont'>on $date</span></br>";
    echo "</div>";
    if ($uid === $_SESSION["data"]["user_id"]) {
        echo '<form action="../deletepost.php" method="post">';
        echo '<input name="id" id="id" type="hidden" value="' . $post_id . '" />';
        echo '<input type="submit" value="Delete" />';
        echo '</form>';
        echo '<form action="../updatepostform.php" method="post">';
        echo '<input name="id" id="id" type="hidden" value="' . $post_id . '" />';
        echo '<input type="submit" value="Update" />';
        echo '</form>';
    }
    echo "<p class='card-text text-color'>$content</p>";
    echo "</div>";
    echo "<br>";
}

