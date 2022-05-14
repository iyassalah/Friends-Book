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
    <title>New Post</title>
    <style>
        <?php
        include '../Styles/navbar.css';
        include '../Styles/newpost.css';
        include '../Styles/standards.css';
        ?>
    </style>
    <title>Update post</title>
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
    <div class="main-section">
        <div class="dark-card newpost-size rounded-border d-flex flex-column justify-content-between align-items-center">
        <?php
        if (isset($_POST['id'])) {
            require_once('../helpers/db.php');
            $pid = $_POST['id'];
            $query = "SELECT content FROM posts WHERE post_id = $pid";
            $result = mysqli_query(db(), $query);
            $content = mysqli_fetch_assoc($result)['content'];
            echo '<form action="./updatepost.php" method="post">
                <input type="hidden" name="id" value="' . $pid . '" id="' . $pid . '">
                <h4><label class="white-font pfont bold" for="content">New post content: </label></h4>
                <input class="newpost-size bg-secondary rounded-border" type="text" name="content" id="content" value="' . $content . '">
                <input class="btn btn-primary" type="submit" value="Update post">
            </form>';
        } else {
            require_once('../templates/error-message.php');
            showError('Something went wrong');
        }
        ?>
        <!-- <button class="btn btn-primary"><a class="icon-button white-font" href="./profile.php">Back to profile page</a></button> -->
        </div>
    </div>
</body>

</html>