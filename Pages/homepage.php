<!DOCTYPE html>
<html lang="en">
<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
    <title>FriendsBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">3
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f83ce35c1.js" crossorigin="anonymous"></script>
    <style>
    <?php include '../Styles/timeline.css';?>
    <?php include '../Styles/homepage.css';?>
    <?php include '../Styles/popups.css';?>
    </style>
</head>

<body>
    <nav class="mynav">
        <div class="nav-container">
            <div class="nav-part">
                <a class="nav-font logo" href="./homepage.php">FriendsBook</a>
            </div>
            <div class="nav-part">
                <a class="nav-font white-font logo" href="./postform.php"><i class="fa-solid fa-memo white-font"></i> New post</a>     
                <a class="nav-font white-font logo" href=" ./profile.php"><i class="fa-solid fa-user white-font"></i>Profile page</a>
            </div>
        </div>
    </nav>

    <section class="main-section">
        <div class="row justify-content-between rounded-border">
            <div class="col-sm-8 white-font card-pading">
                <?php
                if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                include('../models/get-posts.php');
                include('../templates/timeline.php');
                // echo implode($_SESSION["data"]);
                timeline(getPosts($_SESSION["data"]["user_id"]));
                ?>
            </div>
            <div class="col-sm-4 white-font">
                <?php
                // session_start();
                require_once '../templates/show-friend-recommends.php';
                echo implode($_SESSION["data"]);
                showFriendRecs($_SESSION["data"]["user_id"]);
                ?>
            </div>
        </div>
        
    </section>
</body>

</html>