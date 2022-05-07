<?php
function deletePost(string $post_id)
{
    require_once('../helpers/db.php');
    $query = "DELETE FROM posts WHERE post_id = $post_id;";


    $result = mysqli_query(db(), $query);

    if ($result) {
        require_once('../templates/success-message.php');
        showSuccess("Post deleted successfully.");
    } else {
        require_once('../templates/error-message.php');
        showError('Could not delete post.');
    }
}
