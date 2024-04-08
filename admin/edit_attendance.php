<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

// Check if the 'id' parameter is present in the URL
if(isset($_GET['id'])) {
    $attendance_id = $_GET['id'];
    
    // Fetch attendance record based on the provided ID
    $sql = "SELECT * FROM attendance WHERE id = $attendance_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $attendance = $result->fetch_assoc();

        // Check if the update form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $status = $_POST['status'];
            
            // Update the attendance record in the database
            $update_sql = "UPDATE attendance SET status = '$status' WHERE id = $attendance_id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Attendance record updated successfully";
            } else {
                echo "Error updating attendance record: " . $conn->error;
            }
        }

        // Display attendance edit form
        ?>
        <h2>Edit Attendance</h2>
        <form action="#" method="post"> <!-- Changed action to # to submit to the same page -->
            <input type="hidden" name="attendance_id" value="<?php echo $attendance['id']; ?>">
            <label for="status">Status:</label>
            <input type="text" name="status" value="<?php echo $attendance['status']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php

    } else {
        echo "Attendance record not found";
    }
} else {
    echo "Invalid attendance ID";
}

// Include the footer
include '../common/footer.php';
?>
