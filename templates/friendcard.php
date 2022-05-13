<?php
function showFriendCard(array $data, $uid)
{

    ['fname' => $fname, 'lname' => $lname, 'username' => $username, 'user_id' => $user_id, 'accepted' => $accepted] = $data;


    echo "<div class='friend-card d-flex justify-content-between'>";
    echo "<span class='d-flex justify-content-between'> $fname $lname </span>";
    echo "<div class='d-flex justify-content-between' id='confirm" . $user_id . "'>";
    // the first user ID is guaranteed to be unique because it is the sender ID and the recipient ID is fixed 
    if ($accepted) {
        // $loggedUser = $_SESSION["data"]["user_id"];
        echo "<button class = 'btn btn-primary btn-sm pfont add-button-width' onclick='sendConfirm(" . $user_id . ", " . $uid . ", false)'> Remove friend </button> ";
        echo /*html*/"<a href='/messenger.php?sender=$user_id&recipient=$uid'>Message</a>";
    } else {
        echo "<button class='btn btn-primary btn-sm pfont add-button-width' onclick='sendConfirm(" . $user_id . ", " . $uid . ", true)'> Accept </button> ";
        echo "<button class='btn btn-primary btn-sm pfont add-button-width' onclick='sendConfirm(" . $user_id . ", " . $uid . ", false)'> Deny </button> ";
    }
    echo "</div>";
    echo "</div>";
    echo "<br>";
}
