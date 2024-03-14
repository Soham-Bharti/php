<?php
session_start();
require '../config/dbConnect.php';
$desiredUserId = $_SESSION['empUserId'];
$sql = "INSERT into trackingDetails(user_id, status) values ('$desiredUserId','check-in')";
if(mysqli_query($conn,$sql )){
    // echo "Checked In Successfully!";
    header('Location: userDashboard.php');
}
