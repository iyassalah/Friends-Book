<?php
function showAddFriendCard(array $data)
{
    // echo print_r($data);
    ['fname' => $fname, 'lname' => $lname, 'username' => $username, 'user_id' => $user_id] = $data;
    $form = '<form action="homepage.php" method="post">
        <input type="hidden" name="request_recipient" value="' . $user_id . '" />
        <button class="btn btn-primary btn-sm pfont add-button-width"><i class="fa-solid fa-user-plus light-margin"></i>Add Friend</button>
        <!--<input type="submit" name="submit" value="Add Friend" class"btn btn-primary"/>-->
    </form>
    ';

    echo "<div class='add-friend-card d-flex flex-row justify-content-between text-center dark-card rounded-border card-pading'>";
    echo "<span class='username'> $fname $lname</span>";
    echo $form;
    echo "</div>";
    echo "<br>";
}
