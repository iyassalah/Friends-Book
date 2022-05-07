<?php
function showProfile(string $uid)
{
    require_once '../models/get-user-profile.php';
    $data = getUserProfile($uid);
    echo "<div class='name'>";
    echo $data['fname'] . ' ' . $data['lname'] . " (" . $data['username'] . ")";
    echo "</div>";
    echo "<div class='gender'>";
    echo $data['gender'];
    echo "</div>";
    echo "<div class='address'>Lives in ";
    echo $data['address'];
    echo "</div>";
    echo "<div class='date_joined'> Joined on ";
    echo $data['date_joined'];
    echo "</div>";
}
