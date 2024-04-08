<?php 
include '../common/header.php'; 
include '../common/config.php'; 

// Get faculty ID from session or query parameter
$faculty_id = 1; // Replace this with the actual faculty ID retrieval method

?>

<h2>View/Edit Attendance</h2>

<?php
// Fetch attendance information for the faculty's assigned courses
$attendance_sql = "SELECT * FROM attendance WHERE id = $faculty_id";
$attendance_result = $conn->query($attendance_sql);

if ($attendance_result->num_rows > 0) {
    echo "<h3>Your Assigned Course Attendance:</h3>";
    echo "<ul>";
    while ($attendance_row = $attendance_result->fetch_assoc()) {
        echo "<li><strong>Student ID:</strong> " . $attendance_row["enrollment_id"] . "<br>";
        echo "<strong>Date:</strong> " . $attendance_row["date"] . "<br>";
        echo "<strong>Status:</strong> " . $attendance_row["status"] . "</li><br>";
         echo "<a href='edit_attendance.php?id=" . $attendance_row["id"] . "'>Edit</a></li><br>";
    }
    echo "</ul>";
} else {
    echo "No attendance records available.";
}

?>

<?php 
include '../common/footer.php'; 
?>
