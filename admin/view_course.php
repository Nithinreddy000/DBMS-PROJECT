<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Check if the 'id' parameter is present in the URL
if(isset($_GET['id'])) {
    $course_id = $_GET['id'];
    
    // Fetch course record based on the provided ID
    $sql = "SELECT * FROM courses WHERE id = $course_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();

        // Display course details
        ?>
        <h2>Course Details</h2>
        <p>Course Name: <?php echo $course['name']; ?></p>
        <p>Course Code: <?php echo $course['id']; ?></p>
        <p>Course Description: <?php echo $course['description']; ?></p>
        <?php

    } else {
        echo "Course not found";
    }
} else {
    echo "Invalid course ID";
}

// Include the footer
include '../common/footer.php';
?>
