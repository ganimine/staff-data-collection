<?php

foreach ($_POST as $key => $value) {
    if (empty($value) && $value !== '0') {
        echo "Missing: $key<br>";
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
// This script saves employee data submitted from a form.

// save_employee.php
session_start();
include 'includes/db.php';

$school_code = $_SESSION['school_code'] ?? '';
$institution_name = $_SESSION['institution_name'] ?? '';
if (!$school_code) {
    die("Session expired.");
}

function get_percentage($secured, $total) {
    return ($total > 0) ? round(($secured / $total) * 100, 2) : 0;
}

$pg_per = get_percentage($_POST['pg_secured'], $_POST['pg_total']);
$ug_per = get_percentage($_POST['ug_secured'], $_POST['ug_total']);
$bed_per = get_percentage($_POST['bed_secured'], $_POST['bed_total']);
$med_per = get_percentage($_POST['med_secured'], $_POST['med_total']);

$doj = new DateTime($_POST['doj']);
$dot = ($_POST['still_working'] == 'Yes') ? new DateTime() : new DateTime($_POST['dot']);
$interval = $doj->diff($dot);
$service_duration = $interval->y . "Y " . $interval->m . "M " . $interval->d . "D";



// Check for existing entry based on CTET HT No or TET HT No
$ctet_ht = $_POST['ctet_ht'];
$tet_ht = $_POST['tet_ht'];

$check = $conn->prepare("SELECT id FROM employees WHERE ctet_ht = ? OR tet_ht = ?");
$check->bind_param("ss", $ctet_ht, $tet_ht);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "❌ Error: An entry with this CTET HT or TET HT already exists.";
    exit();
}
$check->close();


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Add this for debugging

$stmt = $conn->prepare("INSERT INTO employees (
    school_code, first_name, last_name, father_name, gender, dob, caste,
    pg_degree, pg_university, pg_total, pg_secured, pg_percentage,
    ug_degree, ug_university, ug_total, ug_secured, ug_percentage,
    bed, bed_university, bed_total, bed_secured, bed_percentage,
    med, med_university, med_total, med_secured, med_percentage,
    ctet_qualified, ctet_ht, ctet_session,
    tet_qualified, tet_ht, tet_session, tet_marks,
    institution, post_hold, doj, dot, still_working, service_duration,
    mobile, email, hno, street, village, mandal, district, pincode
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$stmt->bind_param(str_repeat('s', 49),
    $school_code, $_POST['first_name'], $_POST['last_name'], $_POST['father_name'], $_POST['gender'], $_POST['dob'], $_POST['caste'],
    $_POST['pg_degree'], $_POST['pg_university'], $_POST['pg_total'], $_POST['pg_secured'], $pg_per,
    $_POST['ug_degree'], $_POST['ug_university'], $_POST['ug_total'], $_POST['ug_secured'], $ug_per,
    $_POST['bed'], $_POST['bed_university'], $_POST['bed_total'], $_POST['bed_secured'], $bed_per,
    $_POST['med'], $_POST['med_university'], $_POST['med_total'], $_POST['med_secured'], $med_per,
    $_POST['ctet_qualified'], $_POST['ctet_ht'], $_POST['ctet_session'],
    $_POST['tet_qualified'], $_POST['tet_ht'], $_POST['tet_session'], $_POST['tet_marks'],
    $_POST['institution'], $_POST['post_hold'], $_POST['doj'], $_POST['dot'], $_POST['still_working'], $service_duration,
    $_POST['mobile'], $_POST['email'], $_POST['hno'], $_POST['street'], $_POST['village'], $_POST['mandal'], $_POST['district'], $_POST['pincode']
);

if ($stmt->execute()) {
    echo "✅ Submitted Successfully<br>Total service_duration: " . $service_duration;
} else {
    echo "❌ Error: " . $stmt->error;
}
?>
