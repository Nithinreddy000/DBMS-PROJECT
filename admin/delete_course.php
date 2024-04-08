<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Check if the 'id' parameter is present in the URL
if(isset($_GET['id'])) {
    $course_id = $_GET['id'];
    
    // Fetch course record based on the provided ID to display information to the user
    $sql = "SELECT * FROM courses WHERE id = $course_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();

        // Display course details and confirmation form
        ?>
        <h2>Delete Course</h2>
        <p>Are you sure you want to delete the following course?</p>
        <p>Course Name: <?php echo $course['name']; ?></p>
        <p>Course Code: <?php echo $course['id']; ?></p>
        <form action="delete_course_process.php" method="post">
            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
            <input type="submit" value="Yes, Delete">
        </form>
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
