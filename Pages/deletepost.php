<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include '../Styles/popups.css'; ?>
    </style>
</head>

<body>

    <?php
    // echo print_r($_POST);
    require_once('../models/delete-post.php');
    deletePost($_POST['id']);
    ?>
    <a href="./profile.php">Back to profile page</a>
</body>

</html>