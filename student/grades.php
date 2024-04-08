<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); // Redirect to login page if not logged in as a student
    exit();
}

include '../common/header.php';
include '../common/config.php';

$student_id = $_SESSION['user_id']; // Get student ID from session

// Fetch grades for the student
$grades_sql = "SELECT * FROM grades WHERE id = $student_id";
$grades_result = $conn->query($grades_sql);
?>

<h2>View Grades</h2>

<?php
if ($grades_result->num_rows > 0) {
    echo "<h3>Your Grades:</h3>";
    echo "<ul>";
    while ($grade_row = $grades_result->fetch_assoc()) {
        echo "<li><strong>Course Name:</strong> " . $grade_row["assignment"] . "<br>";
        echo "<strong>Grade:</strong> " . $grade_row["score"] . "</li><br>";
    }
    echo "</ul>";
} else {
    echo "No grades available.";
}
?>

<?php
include '../common/footer.php';
?>
