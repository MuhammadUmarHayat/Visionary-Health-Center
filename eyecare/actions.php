<?php
function logout()
{
    session_start();
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session

}
?>