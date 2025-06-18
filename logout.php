<?php
session_start();
//         }
// logout.php
include 'includes/db.php';
session_destroy();
header("Location: login.php");
exit();
?>