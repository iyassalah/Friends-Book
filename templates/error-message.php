<?php
function showError(string $message = null)
{
    session_start(); // THIS NEEDS TO BE AT THE START OF THE FUNCTION
    if ($message) {
        $_SESSION['errormessage'] = $message;
    }
    if (!isset($_SESSION['errormessage'])) {
        return;
    }
    echo '<p class="error-message">' . $_SESSION['errormessage'] . '</p>';
    $_SESSION['errormessage'] = null;
}
