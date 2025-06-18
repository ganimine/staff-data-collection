<?php
session_start();
include 'includes/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $school_code = $_POST['school_code'];
    $mobile_number = $_POST['mobile_number'];

    $query = "SELECT * FROM schools WHERE school_code = ? AND mobile_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $school_code, $mobile_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['school_code'] = $school_code;
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Invalid login details";
    }
}
?>
<form method="post">
    <input type="text" name="school_code" required placeholder="School Code">
    <input type="text" name="mobile_number" required placeholder="Mobile Number">
    <input type="submit" value="Login">
</form>
