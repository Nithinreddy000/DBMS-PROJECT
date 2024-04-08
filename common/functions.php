<?php

include 'config.php';  // Include the database connection

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to generate a random password
function generate_random_password($length = 8) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars), 0, $length);
}

// Function to validate user credentials
// Function to validate user credentials
function validateUser($conn, $username, $password) {
    // Sanitize the input username
    $sanitizedUsername = mysqli_real_escape_string($conn, $username);

    // Query to fetch the user data based on the provided username
    $sql = "SELECT id, username, password, role FROM users WHERE username = '$sanitizedUsername'";
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows === 1) {
        // User found, validate the password
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, return the user data
            return $user;
        } else {
            // Password is incorrect, return false
            return false;
        }
    } else {
        // User not found, return false
        return false;
    }
}


// Function to send an email
function send_email($to, $subject, $message) {
    $headers = "From: your-email@example.com" . "\r\n" .
    "CC: cc@example.com";
    mail($to, $subject, $message, $headers);
}

// Function to create a new user
function createUser($conn, $username, $password, $role) {
    // Sanitize the input data
    $username = sanitize_input($username);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert the new user into the database
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

    // Execute the query and return true if successful, false otherwise
    return mysqli_query($conn, $query);
}

// Additional common functions can be added here based on your project requirements

?>
