<?php include '../common/header.php'; ?>
<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<h2>Welcome to Admin Dashboard</h2>
<p>Welcome, Administrator! You have access to various management functionalities:</p>

<ul>
    <li><a href="students.php">Manage Students</a></li>
    <li><a href="faculty.php">Manage Faculty</a></li>
    <li><a href="courses.php">Manage Courses</a></li>
    <li><a href="grades.php">View/Edit Grades</a></li>
    <li><a href="attendance.php">View/Edit Attendance</a></li>
</ul>

<!-- Additional content can be added here based on your requirements -->
<?php include '../common/footer.php'; ?>
<a href="../admin/logout.php">Logout</a>