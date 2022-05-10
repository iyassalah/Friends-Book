<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_POST["request_recipient"]) && isset($_SESSION["data"]["user_id"])) {
    require_once '../models/add-friend-request.php';
    addFriendship($_SESSION["data"]["user_id"], $_POST["request_recipient"]);
    // idiotic bug warning, make sure that the sender ID is always first
    // and the recipient ID is always second or everything breaks
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?php include '../Styles/timeline.css'; ?>
        <?php include '../Styles/popups.css'; ?>
    </style>
</head>

<body>
    <a href="./profile.php">profile page</a>
    <a href="./postform.php">New post</a>
    <div class="row">
        <div class="col-sm-8">
            <?php
            session_start();
            include('../models/get-posts.php');
            include('../templates/timeline.php');
            // echo implode($_SESSION["data"]);
            timeline(getPosts($_SESSION["data"]["user_id"]));
            ?>
        </div>
        <div class="col-sm-4 users">
            <?php
            // session_start();
            require_once '../templates/show-friend-recommends.php';
            echo implode($_SESSION["data"]);
            showFriendRecs($_SESSION["data"]["user_id"]);
            ?>
        </div>
    </div>
</body>

</html>