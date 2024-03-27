<?php
session_start();
require_once '../../config/dbConnection.php';
require '../../Classes/User.php';

if ($_SESSION['role'] == 'emp') {
    $desiredUserId = $_SESSION['id'];
    $userObject = new User($desiredUserId);
    $result = $userObject -> isCheckedIn();
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $checkInDate = $row['date'];
        if ($checkInDate == date('Y-m-d')) {
            $result = $userObject -> checkOut();
            if ($result) {
                echo "Checked Out Successfully!";
                $_SESSION['checkOutMessage'] = 'success';
                header('Location: userDashboard.php');
            }
        } else {
            // echo "Checked Out Error! You are checked-in from past day/s. Contact Admin!";
            $_SESSION['checkOutCanNotHappenMessage'] = 'success';
            header('Location: userDashboard.php');
        }
    } else {
        echo "corresonding check-in not found for this particular check-out. Contact Admin! ";
    }
} else header('Location: ../start/login.php');
