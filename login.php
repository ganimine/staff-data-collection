<?php
// login.php
session_start();
include 'includes/db.php';

// Handle POST login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $school_code = $_POST['school_code'] ?? '';
    $mobile_number = $_POST['mobile_number'] ?? '';

    $stmt = $conn->prepare("SELECT institution_name FROM schools WHERE school_code = ? AND mobile_number = ?");
    $stmt->bind_param("ss", $school_code, $mobile_number);
    $stmt->execute();
    $stmt->bind_result($institution_name);
    $stmt->fetch();
    $stmt->close();

    if (!$institution_name) {
        echo "<script>alert('Invalid login credentials'); window.location.href='login.php';</script>";
        exit();
    }

    $_SESSION['school_code'] = $school_code;
    $_SESSION['institution_name'] = $institution_name;

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Login Portal</title>
    <style>
        body {
            font-family: Arial;
            max-width: 500px;
            margin: 50px auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        header img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        form label {
            margin-bottom: 10px;
        }
        form input[type="text"] {
            margin-bottom: 15px;
        }
        form input[type="submit"] {
            margin-top: 10px;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: Arial, sans-serif;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <img src="assests/logo.png" alt="Logo" style="width: 100%; height: 120px; object-fit: cover;">
    </header>
    <h2>School Login Portal</h2>
    <form method="POST" action="login.php">
        <label>School Code:
            <input type="text" name="school_code" required>
        </label>
        <label>Mobile Number:
            <input type="text" name="mobile_number" required>
        </label>
        <input type="submit" value="Login">
    </form>
</body>
</html>
