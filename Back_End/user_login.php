<?php
    require "./configure_database.php";
    require "./check_user.php";
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $getUsername = "Select username, password from users";
    $result = mysqli_query($conn, $getUsername);
    
    if (checkUser($username, $password, $result) == 1) {
        //go to home page
        echo "now you must in the home page";
    } else {
        echo '<script>alert("Wrong Username or Password")</script>';
    }
    
?>