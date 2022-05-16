<?php
require_once '../helpers/db.php';

function addLike(string $user_id, string $post_id)
{
    try {
        $query = "INSERT INTO likes (user_id, post_id) VALUES ('$user_id', '$post_id')";
        $conn = db(); // you need to store it for some reason  other wise it would not work
        $result = mysqli_query($conn, $query); // FIXME figure out why you have to store db() instead of calling it twice
    } catch (\Throwable $th) {
        throw new Exception("Database error");
    }
}

function deleteLike(string $user_id, string $post_id)
{
    try {
        $query = "DELETE FROM likes WHERE user_id = $user_id AND post_id = $post_id;";
        $conn = db(); // you need to store it for some reason  other wise it would not work
        $result = mysqli_query($conn, $query); // FIXME figure out why you have to store db() instead of calling it twice
    } catch (\Throwable $th) {
        throw new Exception("Database error");
    }
}
