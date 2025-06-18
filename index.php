<?php
session_start();
if (!isset($_SESSION['school_code']) || !isset($_SESSION['institution_name'])) {
    header("Location: login.php");
    exit();
}

$school_code = $_SESSION['school_code'];
$institution_name = $_SESSION['institution_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Performance Form</title>
    <style>
        body {
            font-family: Arial;
            max-width: 700px;
            margin: auto;
            padding: 20px;
        }
        header img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
        a {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo">
    </header>

    <h1>School Login Portal</h1>
    <h1>Outsourcing Teaching Staff Data Collection</h1>
    
    <h2>Welcome: <?php echo htmlspecialchars($institution_name); ?> (<?php echo htmlspecialchars($school_code); ?>)</h2>
    <a href="logout.php">Logout</a>

    <form method="POST" action="save_employee.php">
        <p><a href="index.html">Go to Full Form</a></p>
        <p><a href="emp_form.php">Go to Employee Form</a></p>
        <p><a href="view_employees.php">View Employees</a></p>
        <p><a href="view_performance.php">View Performance</a></p>
        <p><a href="view_performance_by_teacher.php">View Performance by Teacher</a></p>
        <p><a href="view_performance_by_subject.php">View Performance by Subject</a></p>
        <p><a href="view_performance_by_class.php">View Performance by Class</a></p>
		
    </form>

    <footer>
        <p>&copy; 2023 RC, Khammam :: Teacher Performance System</p>
        <p>Developed by: Ganesh S</p>
    </footer>
</body>
</html>
