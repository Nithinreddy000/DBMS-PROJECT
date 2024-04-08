<?php 
include '../common/header.php'; 
include '../common/config.php'; 

// Get faculty ID from session or query parameter
$faculty_id = 1; // Replace this with the actual faculty ID retrieval method

?>

<h2>View/Edit Grades</h2>

<?php
// Fetch grades information for the faculty's assigned courses
$grades_sql = "SELECT * FROM grades WHERE id = $faculty_id";
$grades_result = $conn->query($grades_sql);

if ($grades_result->num_rows > 0) {
    echo "<h3>Your Assigned Course Grades:</h3>";
    echo "<ul>";
    while ($grade_row = $grades_result->fetch_assoc()) {
        echo "<li><strong>Student ID:</strong> " . $grade_row["id"] . "<br>";
        echo "<strong>Course ID:</strong> " . $grade_row["assignment"] . "<br>";
        echo "<strong>Grade:</strong> " . $grade_row["score"] . "</li><br>";
        echo "<a href='edit_grade.php?id=" . $grade_row["id"] . "'>Edit</a></li><br>";
    }
    echo "</ul>";
} else {
    echo "No grades available.";
}

?>

<?php 
include '../common/footer.php'; 
?>
