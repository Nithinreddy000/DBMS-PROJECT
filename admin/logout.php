<?php
// Start the session
session_start();

// Check if the user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Unset all session values
    $_SESSION = array();

    // Destroy the session
    session_destroy();
    
    // Redirect to login page with a confirmation message
    header("Location: ../index.php?logout=1");
    exit;
} else {
    // If the user is not logged in, simply redirect to the login page
    header("Location: ../index.php");
    exit;
}
?>
