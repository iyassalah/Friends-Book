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
    require_once('../helpers/db.php');
    $content = $_POST['content'];
    $id = $_POST['id'];
    $query = "UPDATE posts SET content = '$content' WHERE post_id = '$id'";
    $result = mysqli_query(db(), $query);
    if ($result) {
        require_once('../templates/success-message.php');
        showSuccess("Post updated successfully.");
    } else {
        require_once('../templates/error-message.php');
        showError('Could not update post.');
    }
    ?>
    <a href="./profile.php">Back to profile page</a>
</body>

</html>