<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); // Redirect to login page if not logged in as a student
    exit();
}

include '../common/header.php';
include '../common/config.php';

$student_id = $_SESSION['user_id']; // Get student ID from session

// Fetch attendance history for the student
$attendance_sql = "SELECT * FROM attendance WHERE id = $student_id";
$attendance_result = $conn->query($attendance_sql);
?>

<h2>Attendance History</h2>

<?php
if ($attendance_result->num_rows > 0) {
    echo "<ul>";
    while ($attendance_row = $attendance_result->fetch_assoc()) {
        echo "<strong>Date:</strong> " . $attendance_row["date"] . "<br>";
        echo "<strong>Status:</strong> " . $attendance_row["status"] . "</li><br>";
    }
    echo "</ul>";
} else {
    echo "No attendance records available.";
}
?>

<?php
include '../common/footer.php'; 
?>
