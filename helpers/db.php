<?php

function db(): mysqli
{
    static $pdo;

    if (!$pdo) {

        $DB_HOST = 'localhost';
        $DB_NAME = 'friends-book-v0.0';
        $DB_USER = 'root';
        $DB_PASSWORD = '';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    };


    return $pdo;
}
