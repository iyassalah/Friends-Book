<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f83ce35c1.js" crossorigin="anonymous"></script>
    <style>
        <?php
        include '../Styles/popups.css';
        include '../Styles/standards.css';

        ?>
    </style>
</head>

<body>
    <section class="main-section d-flex align-content-center">
        <?php
        require_once('../helpers/db.php');
        $content = $_POST['comment-field'];
        $post_id = $_POST['post_id'];
        $commenter_id = $_POST['user_id'];
        $query = "INSERT INTO comments (post_id, comment_id, date_added, content, commenter_id) VALUES ('$post_id', 'NULL', current_timestamp(), '$content', '$commenter_id')";
        $result = mysqli_query(db(), $query);
        if ($result) {
            echo "<script type='text/javascript'>alert('comment added successfully');</script>";
        } else {
            echo "<script type='text/javascript'>alert('comment was not added successfully');</script>";
        }
        header("Location: homepage.php");
        exit;
        ?>
    </section>
    
</body>

</html>