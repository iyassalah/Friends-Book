<?php
function addFriendship(string $user1, string $user2)
{
    require_once '../helpers/db.php';
    require_once '../templates/success-message.php';
    require_once '../templates/error-message.php';
    $user1 = mysqli_real_escape_string(db(), $user1);
    $user2 = mysqli_real_escape_string(db(), $user2);
    $query = "INSERT INTO `friendships`(
        `friend1_id`,
        `friend2_id`,
        `date_created`,
        `accepted`
    )
    VALUES('$user1', '$user2', CURRENT_TIMESTAMP(), '0')";
    $result = null;
    try {
        $result = mysqli_query(db(), $query);
    } catch (\Throwable $th) {
        showError("Database error");
    }
    if (!$result) {
        showError("could not create friend request");
    } else {
        $_SESSION['successmessage'] = "successfully sent friend request.";
        showSuccess();
    }
}