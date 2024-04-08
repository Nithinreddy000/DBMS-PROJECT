<?php
session_start();
include 'common/config.php';
include 'common/functions.php';

if (isset($_SESSION['loggedin'])) {
    header('Location: student/dashboard.php');
    exit();
}

$signupError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = 'student'; // Assuming this is a student signup page

    if ($password === $confirmPassword) {
        // Passwords match, proceed with user creation
        if (createUser($conn, $username, $password, $role)) {
            // User creation successful, redirect to login page
            header('Location: index.php?signup=success');
            exit();
        } else {
            $signupError = "Failed to create user. Please try again.";
        }
    } else {
        $signupError = "Passwords do not match. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>Sign Up for the Learning Portal</h1>
    </header>
    <main>
        <form action="signup.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <?php
        if (!empty($signupError)) {
            echo "<p class='error'>$signupError</p>";
        }
        ?>
        <p>Already have an account? <a href="index.php">Login here</a>.</p>
    </main>
    <footer>
        <p>&copy; 2024 Learning Portal</p>
    </footer>
</body>
</html>
