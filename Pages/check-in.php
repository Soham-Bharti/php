<?php
session_start();
require '../config/dbConnect.php';
if ($_SESSION['role'] == 'emp') {
    $desiredUserId = $_SESSION['id'];
    $sql = "INSERT into employeeTrackingDetails(user_id, check_in_time) values ('$desiredUserId',now())";
    if (mysqli_query($conn, $sql)) {
        // echo "Checked In Successfully!";
        header('Location: userDashboard.php');
    }
}else header('Location: login.php');
