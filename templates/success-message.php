<?php
function showSuccess(string $message = null)
{
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    } // THIS NEEDS TO BE AT THE START OF THE FUNCTION
    if ($message) {
        $_SESSION['successmessage'] = $message;
    }
    if (!isset($_SESSION['successmessage'])) {
        return;
    }
    echo '<p class="success-message">' . $_SESSION['successmessage'] . '</p>';
    $_SESSION['successmessage'] = null;
}
