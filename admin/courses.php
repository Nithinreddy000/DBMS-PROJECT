<?php 
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Fetch course data from the database
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Manage Courses</h2>";
    echo "<p>Below is the list of courses:</p>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . " - <a href='view_course.php?id=" . $row["id"] . "'>Details</a> | <a href='edit_course.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_course.php?id=" . $row["id"] . "'>Delete</a>";
    }
    echo "</ul>";
} else {
    echo "No courses found";
}

// Include the footer
include '../common/footer.php';
?>
