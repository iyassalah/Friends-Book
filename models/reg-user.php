<?php
require_once '../helpers/db.php';
require_once '../helpers/check-duplicates.php';
/**
 * @return true if the registration was successful
 */
function regUser(array $data)
{
    [
        "firstname" => $fname,
        "lastname" => $lname,
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "flexRadioDefault" => $gender,
        "tele-number" => $phone,
        "address" => $address,
        // "image" => $image,
    ] = $data;

    if (checkDuplicate($username, $email)) {
        require_once '../templates/error-message.php';
        showError("Username or email taken");
        return false;
    }
    $query = "INSERT INTO `users`(
    `email`,
    `username`,
    `password`,
    `phone`,
    `date_joined`,
    `address`,
    `gender`,
    `fname`,
    `lname`
)
VALUES(
    '$email',
    '$username',
    SHA2(CONCAT('salt', '$password'), 256),
    '$phone',
    CURRENT_TIMESTAMP(), '$address', '$gender', '$fname', '$lname');";


    try {
        return mysqli_query(db(), $query);
    } catch (\Throwable $th) {
        echo "data base errror";
    }
}
