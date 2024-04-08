<?php
session_start();
include './common/config.php';
include './common/functions.php';

// Redirect to dashboard if already logged in
if (isset($_SESSION['loggedin'])) {
    header('Location: student/index.php');
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the user credentials
    $user = validateUser($conn, $username, $password); // Assuming this function exists in common/functions.php

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect to the dashboard based on the user's role
        if ($user['role'] === 'student') {
            header('Location: student/index.php');
            exit();
        } elseif ($user['role'] === 'admin') {
            header('Location: admin/index.php');
            exit();
        }
        elseif ($user['role'] === 'faculty') {
            header('Location: faculty/index.php');
            exit();
        }
    } else {
        $loginError = "Invalid username or password. Please try again.";
    }
}

include './header.php'; // Include the header
?>
<main>
    <h2>Login</h2>
    <head>
        <link rel="stylesheet" href="./style.css"/>
        <script src="script.js"></script>
    </head>
    <?php
    if (isset($loginError)) {
        echo "<p class='error'>$loginError</p>";
    }
    ?>
    <form action="index.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
</main>
<?php
include './footer.php'; // Include the footer
?>
