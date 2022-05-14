<?php
function showFriendCard(array $data, $uid)
{

    ['fname' => $fname, 'lname' => $lname, 'username' => $username, 'user_id' => $user_id, 'accepted' => $accepted] = $data;


    echo "<div class='d-flex justify-content-between card-width'>";
    echo "<span class=''> $fname $lname </span>";
    echo "<div class='d-flex justify-content-between frind-card card-buttons-area' id='confirm" . $user_id . "'>";
    // the first user ID is guaranteed to be unique because it is the sender ID and the recipient ID is fixed 
    if ($accepted) {
        // $loggedUser = $_SESSION["data"]["user_id"];
        echo "<button class = 'btn btn-primary btn-sm pfont icon-button' onclick='sendConfirm(" . $user_id . ", " . $uid . ", false)'><i class='fa-solid fa-user-slash white-font'></i></button> ";
        echo /*html*/"<a href='/messenger.php?sender=$user_id&recipient=$uid' class='icon-button'><button class='btn btn-primary btn-sm pfont icon-button'><i class='fa-solid fa-message'></i></button></a>";
    } else {
        echo "<button class='btn btn-primary btn-sm pfont icon-button' onclick='sendConfirm(" . $user_id . ", " . $uid . ", true)'> <i class='fa-solid fa-check whitefont'></i> </button> ";
        echo "<button class='btn btn-primary btn-sm pfont icon-button' onclick='sendConfirm(" . $user_id . ", " . $uid . ", false)'> <i class='fa-solid fa-xmark'></i> </button> ";
    }
    echo "</div>";
    echo "</div>";
    echo "<br>";
}
