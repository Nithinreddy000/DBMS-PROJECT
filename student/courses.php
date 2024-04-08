<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); // Redirect to the login page if not logged in as a student
    exit();
}

include '../common/header.php';
include '../common/config.php';

$student_id = $_SESSION['user_id']; // Get student ID from the session

// Fetch enrolled courses for the student
$courses_sql = "SELECT * FROM enrollments WHERE student_id = $student_id"; // Corrected the WHERE clause to match the student_id column
$courses_result = $conn->query($courses_sql);

?>

<h2>View Enrolled Courses</h2>

<?php
if ($courses_result) {
    if ($courses_result->num_rows > 0) {
        echo "<h3>Your Enrolled Courses:</h3>";
        echo "<ul>";
        while ($course_row = $courses_result->fetch_assoc()) {
            echo "<li><strong>Course id:</strong> " . $course_row["id"] ."</li><br>";
        }
        echo "</ul>";
    } else {
        echo "No enrolled courses found.";
    }
} else {
    echo "Error: " . $conn->error; // Display any database errors for debugging
}

include '../common/footer.php'; 
?>
