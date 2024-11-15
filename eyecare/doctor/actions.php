<?php


function start_session()
{
    session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_id"])) 
{
    header("Location: login.php");
    exit();
}
else
{
    $email = $_SESSION["user_id"];
    return $email;
}
}
function logout()
{
    // Start the session
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
}