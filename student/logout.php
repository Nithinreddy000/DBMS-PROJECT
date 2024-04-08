<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['role'] === 'student') {
    // Unset all session values
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page with a logout message
    header("Location: ../index.php?logout=1");
    exit;
} else {
    // If the user is not logged in as a student, redirect to the login page
    header("Location: ../index.php");
    exit;
}
?>
