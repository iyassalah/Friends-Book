<?php
require_once '../templates/likes-card.php';
include 'comment-card.php';
function showPost(array $postData)
{
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ['fname' => $fname, 'lname' => $lname, 'content' => $content, 'postdate' => $date, 'author_id' => $uid, 'post_id' => $post_id,] = $postData;
    echo "<div class='d-flex flex-column rounded-border card-body dark-card post-width'>";
    echo "<div class='d-flex flex-row justify-content-between text-center'>";
    echo "<span><h5 class='card-title pfont heading-color'> $fname $lname </h5></span>";
    echo "<span class='card-subtitle mb-2 text-muted small-font pfont'>on $date</span></br>";
    echo "<div class='edit-buttons-holder'>";
    if ($uid === $_SESSION["data"]["user_id"]) {
        echo '<form action="../deletepost.php" method="post">';
        echo '<input name="id" id="id" type="hidden" value="' . $post_id . '" />';
        echo '<button type="submit" class="no-border icon-button no-background"><i class="fa-solid fa-trash-can white-font"></i></button>';
        echo '</form>';
        echo '<form action="../updatepostform.php" method="post">';
        echo '<input name="id" id="id" type="hidden" value="' . $post_id . '" />';
        echo '<button type="submit" class="no-border icon-button no-background"><i class="fa-solid fa-pen-to-square white-font"></i></button>';
        echo '</form>';
    }
    echo "</div>";
    echo "</div>";
    echo "<p class='card-text text-color'>$content</p>";
    if (isset($postData['like_count']) && isset($postData["liked_by_user"])) {
        ['like_count' => $like_count, "liked_by_user" => $liked_by_user] = $postData;
        renderLikesCard($post_id, $liked_by_user, $like_count);
    }
    
    if ($uid !== $_SESSION["data"]["user_id"]) {
        echo '<br>';
        echo '<div class="d-flex justify-content-between">';
        echo '<form action="../addComment.php" method="post">';
        echo '<input name="post_id" id="post_id" type="hidden" value="' . $post_id . '" />';
        echo '<input name="user_id" id="user_id" type="hidden" value="' . $_SESSION["data"]["user_id"] . '" />';
        echo '<input id="comment-field" class="comment-field" name="comment-field" type="text" value=""/>';
        echo '<button type="submit" class="comment-button btn btn-primary btn-sm"> Comment <i class="fa-solid fa-comment whitefont"></i> </button>';
        echo '</form>';
        echo '</div>';
    
    }
    
    // renderComments($post_id);

    echo "</div>";
    echo "<br>";
}
