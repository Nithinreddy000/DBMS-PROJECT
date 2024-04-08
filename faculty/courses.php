<?php 
include '../common/header.php'; 
include '../common/config.php'; 

// Get faculty ID from session or query parameter
$faculty_id = 1; // Replace this with the actual faculty ID retrieval method

?>

<h2>Assigned Courses</h2>

<?php
// Fetch course information for the faculty
$courses_sql = "SELECT * FROM courses WHERE id = $faculty_id";
$courses_result = $conn->query($courses_sql);

if ($courses_result->num_rows > 0) {
    echo "<ul>";
    while ($course_row = $courses_result->fetch_assoc()) {
        echo "<li><strong>Course Name:</strong> " . $course_row["name"] . "<br>";
        echo "<strong>Course Code:</strong> " . $course_row["id"] . "<br>";
    }
    echo "</ul>";
} else {
    echo "No courses assigned.";
}

?>

<?php 
include '../common/footer.php'; 
?>
