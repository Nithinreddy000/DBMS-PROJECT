<?php 
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Fetch faculty data from the database
$sql = "SELECT * FROM faculty";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Manage Faculty</h2>";
    echo "<p>Below is the list of faculty:</p>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . " - <a href='view_faculty.php?id=" . $row["user_id"] . "'>Details</a> | <a href='edit_faculty.php?id=" . $row["user_id"] . "'>Edit</a> | <a href='delete_faculty.php?id=" . $row["user_id"] . "'>Delete</a>";
    }
    echo "</ul>";
} else {
    echo "No faculty found";
}

// Include the footer
include '../common/footer.php';
?>
