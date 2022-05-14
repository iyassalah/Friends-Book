<?php
session_start();
$uid = $_SESSION["data"]["user_id"]
?>
<div class='dark-card newpost-size rounded-border d-flex flex-column justify-content-between align-items-center'>
    <form action="/addpost.php" method="post">
        <h4><label class='white-font pfont bold' for="content">What do you want to say: </label></h4>
        <br><br>
        <input class="newpost-size bg-secondary rounded-border" type="text" name="content" id="content">
        <input type="hidden" name="uid" value="<?php echo $uid ?>">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Post">
    </form>
</div>