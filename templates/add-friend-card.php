<?php
function showAddFriendCard(array $data)
{
    // echo print_r($data);
    ['fname' => $fname, 'lname' => $lname, 'username' => $username, 'user_id' => $user_id] = $data;
    $form = '<form action="homepage.php" method="post">
        <input type="hidden" name="request_recipient" value="' . $user_id . '" />
        <input type="submit" name="submit" value="Add Friend" />
    </form>
    ';

    echo "<div class='add-friend-card'>";
    echo "<span class='username'> $fname $lname ($username)</span>";
    echo $form;
    echo "</div>";
}
