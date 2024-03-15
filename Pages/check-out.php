<?php
session_start();
require '../config/dbConnect.php';
$desiredUserId = $_SESSION['id'];
$sql = "INSERT into trackingDetails(user_id, status) values ('$desiredUserId','check-out')";
if(mysqli_query($conn,$sql )){
    // echo "Checked Out Successfully!";
    header('Location: userDashboard.php');
}
