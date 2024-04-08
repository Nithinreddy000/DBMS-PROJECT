<?php 
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Fetch student data from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Manage Students</h2>";
    echo "<p>Below is the list of students:</p>";
    
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . " - <a href='view_student.php?id=" . $row["user_id"] . "'>Details</a> | <a href='edit_student.php?id=" . $row["user_id"] . "'>Edit</a> | <a href='delete_student.php?id=" . $row["user_id"] . "'>Delete</a></li>";
    }
    echo "</ul>";
} else {
    echo "No students found";
}

// Include the footer
include '../common/footer.php';
?>
