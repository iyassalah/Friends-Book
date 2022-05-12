<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        <?php
        $sender = $_GET['sender']; // TODO properly fetch chat ID 
        $recipient = $_GET['recipient'];
        echo "const sender = $sender;"; // TODO properly send in IDs to JS
        echo "const recipient = $recipient;";
        include '../templates/js/messenger.js';
        ?>
    </script>
    <style>
        <?php
        include '../Styles/messenger.css';
        ?>
    </style>
    <title>Document</title>
</head>

<body>
    <div id="timeline">

    </div>
    <div id="msgbox">
        <input type="text" id="in">
        <button onclick="handleClick()">send</button>
    </div>
    <?php

    ?>
</body>

</html>