<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
        include("..\Styles\profile.css");
        include '../Styles/timeline.css';
        // echo '<link rel="stylesheet" href="../Styles/loginStyle.css">';
        ?>
    </style>
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        <?php
        include '../templates/js/confirm-request.js';
        ?>
    </script>
</head>

<body>
    <h1>profile page</h1>
    <a href="./homepage.php">homepage</a>
    <div class="main-container">
        <?php
        session_start();
        require_once '../templates/profile-page.php';
        $uid = $_SESSION["data"]["user_id"];
        // echo print_r($_SESSION);
        if (isset($uid)) {
            showProfile($uid);
        }
        ?>
    </div>
    <div class="timeline">
        <?php
        // echo print_r($_SESSION);
        require_once('../models/get-user-profile.php');
        require_once('../templates/timeline.php');
        if (isset($uid)) {
            $posts = getUserPosts($uid);
            timeline($posts);
        }
        ?>
    </div>
    <div class="friendsbar">

    </div>
</body>

</html>