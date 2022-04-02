<?php
function showFriendRecs(string $user_id)
{
    require_once '../models/get-recommended-friends.php';
    require_once '../templates/add-friend-card.php';
    $result = getRecommendedFriends($user_id);
    while ($row = mysqli_fetch_assoc($result)) {
        showAddFriendCard(($row));
    }
}
