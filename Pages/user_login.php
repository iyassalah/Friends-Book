<?php
    // require "../Back_End/configure_database.php";
    // require "./Back_End/check_user.php";
    require_once "../models/login.php";
    // session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    login($username, $password);

    // $getUsername = "Select username, password from users";
    // $result = mysqli_query($conn, $getUsername);
    
    // if (checkUser($username, $password, $result) == 1) {
    //     //go to home page
    //     echo "now you must in the home page";
    // } else {
    //     echo '<script>alert("Wrong Username or Password")</script>';
    // }
    
?>