<?php
function showFriendCard(array $data, $uid)
{

    ['fname' => $fname, 'lname' => $lname, 'username' => $username, 'user_id' => $user_id, 'accepted' => $accepted] = $data;


    echo "<div class='friend-card'>";
    echo "<span class='username'> $fname $lname </span>";
    echo "<div id='confirm" . $user_id . "'>";
    // the first user ID is guaranteed to be unique because it is the sender ID and the recipient ID is fixed 
    if ($accepted) {
        // $loggedUser = $_SESSION["data"]["user_id"];
        echo "<button onclick='sendConfirm(" . $user_id . ", " . $uid . ", false)'> Remove friend </button> ";
        echo /*html*/"<a href='/messenger.php?sender=$user_id&recipient=$uid'>Message</a>";
    } else {
        echo "<button onclick='sendConfirm(" . $user_id . ", " . $uid . ", true)'> accept </button> ";
        echo "<button onclick='sendConfirm(" . $user_id . ", " . $uid . ", false)'> deny </button> ";
    }
    echo "</div>";
    echo "</div>";
}
