<?php
function showError()
{
    session_start(); // THIS NEEDS TO BE AT THE START OF THE FUNCTION
    if (!isset($_SESSION['errormessage'])) {
        return;
    }
    echo '<p class="error-message">' . $_SESSION['errormessage'] . '</p>';
    $_SESSION['errormessage'] = null;
}
