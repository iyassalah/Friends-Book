<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['id'])) {
        require_once('../helpers/db.php');
        $pid = $_POST['id'];
        $query = "SELECT content FROM posts WHERE post_id = $pid";
        $result = mysqli_query(db(), $query);
        $content = mysqli_fetch_assoc($result)['content'];
        echo '<form action="./updatepost.php" method="post">
            <input type="hidden" name="id" value="' . $pid . '" id="' . $pid . '">
            <label for="content">New post content: </label>
            <input type="text" name="content" id="content" value="' . $content . '">
            <input type="submit" value="Update post">
        </form>';
    } else {
        require_once('../templates/error-message.php');
        showError('Something went wrong');
    }
    ?>
    <a href="./profile.php">Back to profile page</a>

</body>

</html>