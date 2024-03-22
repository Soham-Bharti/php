<?php
session_start();
require '../../config/dbConnect.php';
if ($_SESSION['role'] == 'emp') {
    $desiredUserId = $_SESSION['id'];
    $sql1 = "SELECT date(check_in_time) as date from employeeTrackingDetails where user_id = '$desiredUserId' and deleted_at is null order by check_in_time desc limit 1;";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        $checkInDate = $row1['date'];

        if ($checkInDate == date('Y-m-d')) {
            $sql = "UPDATE employeeTrackingDetails set check_out_time = now(), updated_at = now() where user_id = '$desiredUserId' order by check_in_time desc limit 1";
            if (mysqli_query($conn, $sql)) {
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
} else header('Location: ../common/login.php');
