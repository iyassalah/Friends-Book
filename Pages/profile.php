<!DOCTYPE html>
<html lang="en">
<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
        include("../Styles/profilepage.css");
        include("../Styles/standards.css");
        include '../Styles/navbar.css';

        // echo '<link rel="stylesheet" href="../Styles/loginStyle.css">';
        ?>
    </style>
    <title>Profile page</title>
    <<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f83ce35c1.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        <?php
        include '../templates/js/confirm-request.js'; // FIXME this causes headers to be set for some reason even tho its just JS, no idea how no idea why, any include or session start after this fails
            
        ?>
    </script>
</head>

<body class="dark-background">

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
            <div class="col-sm-4 white-font card-pading dark-card rounded-border card-pading d-flex align-items-center flex-column">
                <?php
                require_once '../templates/profile-page.php';
                $uid = $_SESSION["data"]["user_id"];
                // echo print_r($_SESSION);
                if (isset($uid)) {
                    showProfile($uid);
                }
                ?>
                <!-- <img src="" alt=""> -->
            </div>
            <div class="col-sm-8 white-font ">
                <div class="">
                    <?php
                    // echo print_r($_SESSION);
                    require_once('../models/get-user-profile.php');
                    require_once('../templates/timeline.php');
                    if (isset($uid)) {
                        $posts = getUserPosts($uid);
                        timeline($posts);
                        echo "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="friendsbar">
    
        </div>
    </section>
</body>

</html>