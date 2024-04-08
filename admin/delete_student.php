<?php
// Database connection
include '../common/config.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete the student record from the database
    $delete_sql = "DELETE FROM students WHERE user_id = $user_id";
    if ($conn->query($delete_sql) === TRUE) {
        // Student deleted successfully
        header("Location: students.php?delete=success");
        exit;
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Invalid student ID";
}
?>
