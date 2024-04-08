<?php
// Include the header
include '../common/header.php';

// Database connection
include '../common/config.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch faculty record based on the provided ID
    $sql = "SELECT * FROM faculty WHERE user_id = $user_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $faculty = $result->fetch_assoc();

        // Check if the update form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            // Update the faculty record in the database
            $update_sql = "UPDATE faculty SET name = '$name', email = '$email' WHERE user_id = $user_id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Faculty updated successfully";
            } else {
                echo "Error updating faculty: " . $conn->error;
            }
        }
        
        // Display faculty edit form
        ?>
        <h2>Edit Faculty</h2>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $faculty['name']; ?>">
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $faculty['email']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php

    } else {
        echo "Faculty not found";
    }
} else {
    echo "Invalid faculty ID";
}

// Include the footer
include '../common/footer.php';
?>
