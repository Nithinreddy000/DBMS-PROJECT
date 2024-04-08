<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

if(isset($_GET['id'])) {
    $grade_id = $_GET['id'];

    // Fetch grade record based on the provided ID
    $sql = "SELECT * FROM grades WHERE id = $grade_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $grade = $result->fetch_assoc();

        // Check if the grade update form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_score = $_POST['score'];
            
            // Update the grade record in the database
            $update_sql = "UPDATE grades SET score = '$new_score' WHERE id = $grade_id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Grade updated successfully";
            } else {
                echo "Error updating grade: " . $conn->error;
            }
        }
        
        // Display the grade edit form
        ?>
        <h2>Edit Grade</h2>
        <form action="#" method="post">
            <label for="score">New Score:</label>
            <input type="text" name="score" value="<?php echo $grade['score']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php

    } else {
        echo "Grade not found";
    }
} else {
    echo "Invalid grade ID";
}

// Include the footer
include '../common/footer.php';
?>
