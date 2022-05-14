<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f83ce35c1.js" crossorigin="anonymous"></script>
    <style>
        <?php
        include '../Styles/navbar.css';
        include '../Styles/newpost.css';
        include '../Styles/standards.css';
        ?>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $sender = $_GET['sender']; // TODO properly fetch chat ID 
    $recipient = $_GET['recipient'];
    if ($sender != $_SESSION["data"]["user_id"] && $recipient != $_SESSION["data"]["user_id"]) {
        // header("Location: /403.php");
    }
    ?>
    <?php
    require_once '../models/get-user-profile.php';
    $contact = getUserPublicInfo($sender);
    ?>
    <script>
        <?php
        echo "const sender = $sender;"; // TODO properly send in IDs to JS
        echo "const recipient = $recipient;";
        echo "const sender_username = '" . $contact['username'] . "';";
        include '../templates/js/messenger.js';
        ?>
    </script>
    <style>
        <?php
        include '../Styles/messenger.css';
        ?>
    </style>
    <title>Messenger</title>
</head>

<body>
    <nav class="mynav">
        <div class="nav-container">
            <div class="nav-part">
                <a class="nav-font logo" href="./homepage.php">FriendsBook</a>
            </div>
            <div>
                <a class="nav-font white-font logo" href=" ./profile.php"><i class="fa-solid fa-user white-font"></i>Profile page</a>
            </div>
        </div>
    </nav>
    <section class="main-section">
        <h3 class="white-font" id="fullname"><?php echo $contact['fname'] . $contact['lname']; ?></h1>
            <!-- <h4 id="username"><?php echo '@' . $contact['username']; ?></h1> -->
                <div id="timeline">

                </div>
                <div id="msgbox">
                    <input class="bg-secondary rounded-border" type="text" id="in">
                    <button class="btn btn-primary" onclick="handleClick()">send</button>
                </div>
                <?php

                ?>
    </section>
    
</body>

</html>