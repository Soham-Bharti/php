<?php
session_start();
require '../../config/dbConnect.php';
if ($_SESSION['role'] == 'emp') {
    $desiredUserId = $_SESSION['id'];
    // print_r($_SESSION);
    // getting the number of check-in's on a specific day 
    $sql1 = "SELECT count(date(check_in_time)) as count from employeeTrackingDetails where user_id = '$desiredUserId' and date(check_in_time) = date(now()) and deleted_at is null;";
    $result1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows( $result1 ) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        $totalCheckInCountToday = $row1['count'];
    
        if ($totalCheckInCountToday >= 4) {
            // check in limit reached
            $_SESSION['checkInLimitMessage'] = 'success'; 
            header('Location: userDashboard.php');
        } else {
            $sql = "INSERT into employeeTrackingDetails(user_id, check_in_time) values ('$desiredUserId',now())";
            if (mysqli_query($conn, $sql)) {
                // echo "Checked In Successfully!";
                $_SESSION['checkInMessage'] = 'success'; 
                header('Location: userDashboard.php');
            }
        }
    } else echo "There was an error fetching the data";
    
} else header('Location: ../common/login.php');
mysqli_close($conn);
