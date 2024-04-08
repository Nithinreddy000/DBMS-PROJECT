<?php
// Database connection
include '../common/config.php';

// Check if the 'course_id' parameter is present in the POST request
if(isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];

    // Prepare a delete statement and execute it
    $delete_sql = "DELETE FROM courses WHERE id = $course_id";
    if ($conn->query($delete_sql) === TRUE) {
        // Course deleted successfully
        // Redirect to a page after successful deletion, for example, back to the dashboard
        header("Location: index.php?delete=success");
        exit;
    } else {
        // If an error occurs during deletion, handle the error
        echo "Error deleting course: " . $conn->error;
    }
} else {
    // If the 'course_id' parameter is not present in the POST request, display an error message
    echo "Invalid request. Course ID is required for deletion.";
}
?>
