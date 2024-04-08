<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Fetch attendance data from the database
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>View/Edit Attendance</h2>";
    echo "<p>Below is the attendance data:</p>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Date: " . $row["date"] . " - Student ID: " . $row["enrollment_id"] . " - Status: " . $row["status"] . " - <a href='edit_attendance.php?id=" . $row["id"] . "'>Edit</a>";
    }
    echo "</ul>";
} else {
    echo "No attendance records found";
}

// Include the footer
include '../common/footer.php';
?>