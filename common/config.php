<?php
// Check if the constants are not already defined before defining them
if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost:3307');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'NITHINREDDY');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '123');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'student_management_system');
}

// Attempt to connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn === false) {
    die("ERROR: Connection failed. " . mysqli_connect_error());
}
?>
