<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); // Redirect to login page if not logged in as a student
    exit();
}

include '../common/header.php';
include '../common/config.php';

$student_id = $_SESSION['user_id']; // Get student ID from session

// Fetch enrolled courses for the student
$courses_sql = "SELECT * FROM enrollments WHERE id = $student_id";
$courses_result = $conn->query($courses_sql);
?>
<head>
    <link rel="stylesheet" href="./style.css"/>
</head>


<h2>Student Dashboard</h2>

<a href="courses.php">View Course Details</a> <br><!-- Link to view course details -->
<a href="attendance.php">View Attendance Details</a> <br><!-- Link to view course details -->
<a href="grades.php">View Grade Details</a> <br><!-- Link to view course details -->
<?php
include '../common/footer.php'; 
?>
<a href="../student/logout.php">Logout</a>