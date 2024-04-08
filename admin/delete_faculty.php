<?php
// Database connection
include '../common/config.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete the faculty record from the database
    $delete_sql = "DELETE FROM faculty WHERE user_id = $user_id";
    if ($conn->query($delete_sql) === TRUE) {
        // Faculty deleted successfully
        header("Location: faculty.php?delete=success");
        exit;
    } else {
        echo "Error deleting faculty: " . $conn->error;
    }
} else {
    echo "Invalid faculty ID";
}
?>
