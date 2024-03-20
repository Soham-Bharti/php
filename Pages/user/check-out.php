<?php
session_start();
require '../../config/dbConnect.php';
if ($_SESSION['role'] == 'emp') {
$desiredUserId = $_SESSION['id'];
$sql = "UPDATE employeeTrackingDetails set check_out_time = now(), updated_at = now() where user_id = '$desiredUserId' order by check_in_time desc limit 1";
if(mysqli_query($conn,$sql)){
    // echo "Checked Out Successfully!";
    $_SESSION['checkOutMessage'] = 'success';
    header('Location: userDashboard.php');
}
}else header('Location: ../common/login.php');