<?php
function deletePost(string $post_id)
{
    require_once('../helpers/db.php');
    $post_id = mysqli_real_escape_string(db(), $post_id);
    $query = "DELETE FROM posts WHERE post_id = $post_id;";


    $result = mysqli_query(db(), $query);

    if ($result) {
        require_once('../templates/success-message.php');
        echo "<script type='text/javascript'>alert('Post deleted successfully');</script>";
    } else {
        require_once('../templates/error-message.php');
        echo "<script type='text/javascript'>alert('Could not delete post.');</script>";
    }
}
