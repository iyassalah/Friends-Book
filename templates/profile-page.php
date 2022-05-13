<?php
function showProfile(string $uid)
{
    require_once '../models/get-user-profile.php';
    require_once '../templates/friendsbar.php';
    require_once '../models/get-friends.php';
    $data = getUserProfile($uid);
    echo'<img height="300" width="300" src="data:image;base64,'.$data['image'].'">';
    echo "<br>";
    echo "<h3 class='name nav-font'>";
    echo $data['fname'] . ' ' . $data['lname']; // . " (" . $data['username'] . ")"
    echo "</h3>";
    echo "<div class='gender'>";
    echo $data['gender'];
    echo "</div>";
    echo "<div class='address'>Lives in ";
    echo $data['address'];
    echo "</div>";
    echo "<div class='date_joined'> Joined on ";
    echo $data['date_joined'];
    echo "</div>";    
    showFriendCards(getFriends($uid), $uid);
}
