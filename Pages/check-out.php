<?php
session_start();
require '../config/dbConnect.php';
if ($_SESSION['role'] == 'emp') {
$desiredUserId = $_SESSION['id'];
$sql = "UPDATE employeeTrackingDetails set check_out_time = now(), updated_at = now() where user_id = '$desiredUserId' order by created_at desc limit 1";
if(mysqli_query($conn,$sql)){
    // echo "Checked Out Successfully!";
    header('Location: userDashboard.php');
}
}else header('Location: login.php');