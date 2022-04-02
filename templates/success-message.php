<?php
function showSuccess()
{
    session_start(); // THIS NEEDS TO BE AT THE START OF THE FUNCTION
    if (!isset($_SESSION['successmessage'])) {
        return;
    }
    echo '<p class="success-message">' . $_SESSION['successmessage'] . '</p>';
    $_SESSION['successmessage'] = null;
}
