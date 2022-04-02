<?php
require_once '../helpers/validate-reg.php';
require_once '../models/reg-user.php';
require_once '../templates/success-message.php';
if (validateReg($_POST)) {
    // echo "VALID";
    $success = regUser($_POST);

    if ($success) {
        showSuccess("Successfully registered user.");
    }
}
// echo print_r($_POST);
