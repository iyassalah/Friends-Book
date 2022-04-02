<?php
function addFriendship(string $user1, string $user2)
{
    require_once '../helpers/db.php';
    require_once '../templates/success-message.php';
    $query = "INSERT INTO `friendships`(
        `friend1_id`,
        `friend2_id`,
        `date_created`,
        `accepted`
    )
    VALUES('$user1', '$user2', CURRENT_TIMESTAMP(), '0')";
    $result = mysqli_query(db(), $query);
    if (!$result) {
        showError("could not create friend request");
    } else {
        $_SESSION['successmessage'] = "successfully sent friend request.";
        showSuccess();
    }
}
