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

        // Display faculty details
        ?>
        <h2>Faculty Details</h2>
        <p>User-Id: <?php echo $faculty['user_id']; ?></p>
        <p>Name: <?php echo $faculty['name']; ?></p>
        <p>Email: <?php echo $faculty['email']; ?></p>
        <!-- Additional details can be displayed here -->

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
