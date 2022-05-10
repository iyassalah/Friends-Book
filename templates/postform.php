<?php
session_start();
$uid = $_SESSION["data"]["user_id"]
?>
<form action="/addpost.php" method="post">
    <label for="content">What do you want to say</label>
    <input type="text" name="content" id="content">
    <input type="hidden" name="uid" value="<?php echo $uid ?>">
    <input type="submit" value="Post">
</form>