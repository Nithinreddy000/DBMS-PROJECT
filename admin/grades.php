<?php 
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Fetch grades data from the database
$sql = "SELECT * FROM grades";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>View/Edit Grades</h2>";
    echo "<p>Below is the list of grades:</p>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>Student ID: " . $row["id"] . " - Course ID: " . $row["enrollment_id"] . " - Grade: " . $row["score"] . " - <a href='edit_grade.php?id=" . $row["id"] . "'>Edit</a>";
    }
    echo "</ul>";
} else {
    echo "No grades found";
}

// Include the footer
include '../common/footer.php';
?>
