<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch student based on the provided ID
    $sql = "SELECT * FROM students WHERE user_id = $user_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Check if the update form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user_id = $_POST['id'];
            
            // Update the student record in the database
            $update_sql = "UPDATE students SET user_id = '$user_id', name = '$name', email = '$email' WHERE user_id = $user_id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Student updated successfully";
            } else {
                echo "Error updating student: " . $conn->error;
            }
        }
        
        // Display student edit form
        ?>
        <h2>Edit Student</h2>
        <form action="#" method="post">
            <label for="id">User-Id:</label>
            <input type="text" name="id" value="<?php echo $student['user_id']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $student['name']; ?>">
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $student['email']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php

    } else {
        echo "Student not found";
    }
} else {
    echo "Invalid student ID";
}

// Include the footer
include '../common/footer.php';
?>
