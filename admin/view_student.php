<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch student record based on the provided ID
    $sql = "SELECT * FROM students WHERE user_id = $user_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Display student details
        ?>
        <h2>Student Details</h2>
        <p>Id: <?php echo $student['user_id']; ?></p>
        <p>Name: <?php echo $student['name']; ?></p>
        <p>Email: <?php echo $student['email']; ?></p>
        <!-- Additional details can be displayed here -->

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
