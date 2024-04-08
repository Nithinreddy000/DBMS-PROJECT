<?php 
include '../common/header.php'; 
include '../common/config.php'; 

// Get faculty ID from session or query parameter
$faculty_id = 1; // Replace this with the actual faculty ID retrieval method
?>
<head>
    <link rel="stylesheet" href="./style.css"/>
</head>
<h2>Welcome to Faculty Dashboard</h2>
<?php
// Display link to view/edit grades
echo "<a href='grades.php'>View/Edit Grades</a><br>";

// Display link to view/edit attendance
echo "<a href='attendance.php'>View/Edit Attendance</a><br>";

echo "<a href='courses.php'>Your Assigned Courses</a><br>";
?>

<?php 
include '../common/footer.php'; 
?>
<a href="../faculty/logout.php">Logout</a>