<?php
require_once('../helpers/db.php');
session_start();
function login(string $username, string $password)
{
    $query = "SELECT *, COUNT(*) AS success FROM users WHERE password = '$password' AND username = '$username';";
    $result = mysqli_query(db(), $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo implode($data);
        if ($data['success'] == 1) {
            $_SESSION['data'] = $data;
            $_SESSION['loggedin'] = true;
            header('Location: ' . 'homepage.php');
            return; // login success: end function
        } else {
            // if login failed
            $_SESSION['errormessage'] = "Incorrect credentials";
            header('Location: ' . 'login.php');
        }
    }
}