<?php
function showProfile(string $uid)
{
    require_once '../models/get-user-profile.php';
    $data = getUserProfile($uid);
    foreach ($data as $key => $value) {
        echo $key . ': ' . $value . "<br>";
    }
}
