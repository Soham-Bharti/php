<?php
session_start();
require '../../Classes/User.php';

if ($_SESSION['role'] == 'emp') {
    $desiredUserId = $_SESSION['id'];
    $userObject = new User($desiredUserId);
    // print_r($_SESSION);
    // getting the number of check-in's on a specific day 
    $result = $userObject ->  checkInCounts();
    if(mysqli_num_rows( $result ) > 0) {
        $row = mysqli_fetch_assoc($result);
        $totalCheckInCountToday = $row['count'];
        if ($totalCheckInCountToday >= 4) {
            // check in limit reached
            $_SESSION['checkInLimitMessage'] = 'success'; 
            header('Location: userDashboard.php');
        } else {
            $result = $userObject -> checkIn();
            if ($result) {
                // echo "Checked In Successfully!";
                $_SESSION['checkInMessage'] = 'success'; 
                header('Location: userDashboard.php');
            }
        }
    } else echo "There was an error fetching the data";
    
} else header('Location: ../start/login.php');

