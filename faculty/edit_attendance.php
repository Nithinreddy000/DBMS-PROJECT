<?php 
include '../common/header.php'; 
include '../common/config.php'; 

if(isset($_GET['id'])) {
    $attendance_id = $_GET['id'];

    // Fetch attendance record based on the provided ID
    $sql = "SELECT * FROM attendance WHERE id = $attendance_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $attendance = $result->fetch_assoc();

        // Check if the form is submitted for updating attendance
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_status = $_POST['status'];
            
            // Update the attendance status in the database
            $update_sql = "UPDATE attendance SET status = '$new_status' WHERE id = $attendance_id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Attendance record updated successfully";
            } else {
                echo "Error updating attendance record: " . $conn->error;
            }
        }

        // Display the attendance edit form
        ?>
        <h2>Edit Attendance</h2>
        <form action="#" method="post">
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

include '../common/footer.php'; 
?>
