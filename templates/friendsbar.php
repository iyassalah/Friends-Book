<?php
function showFriendCards(mysqli_result $result, $uid)
{
    require_once '../templates/friendcard.php';
    while ($row = mysqli_fetch_assoc($result)) {
        showFriendCard($row, $uid);
    }
}
