<?php
function renderComments($post_id)
{
    include '../models/get-Comments.php';
    include 'show-comment.php';
    echo "<div class='d-flex flex-column flex-wrap flex-width'>";
    $result = getPostComments($post_id);
    while ($row = mysqli_fetch_assoc($result)) {
        showCommentCard(($row));
    }
    echo "</div>";
}
