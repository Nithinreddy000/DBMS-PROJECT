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

        // Check if the update form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $course_name = $_POST['course_name'];
            $course_code = $_POST['course_code'];
            $description = $_POST['description'];
            
            // Update the course record in the database
            $update_sql = "UPDATE courses SET name = '$course_name', id = '$course_code', description = '$description' WHERE id = $course_id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Course updated successfully";
            } else {
                echo "Error updating course: " . $conn->error;
            }
        }

        // Display course edit form
        ?>
        <h2>Edit Course</h2>
        <form action="#" method="post"> <!-- Changed action to # to submit to the same page -->
            <label for="name">Course Name:</label>
            <input type="text" name="course_name" value="<?php echo $course['name']; ?>">
            <label for="id">Course Code:</label>
            <input type="text" name="course_code" value="<?php echo $course['id']; ?>">
            <label for="description">Description:</label>
            <textarea name="description"><?php echo $course['description']; ?></textarea>
            <input type="submit" value="Update">
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
