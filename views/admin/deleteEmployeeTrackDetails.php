<?php
session_start();
require_once '../../config/dbConnection.php';
require '../../Classes/Admin.php';
$adminObject = new Admin();

// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../start/login.php');
}

if (isset($_GET['id']) && isset($_GET['trackId'])) {
    $desiredUserId = $_GET['id'];
    $desiredTrackId = $_GET['trackId'];
}
if (isset($desiredUserId) && isset($desiredTrackId)) {
    // updating the deleted_at time to current timestamp in database so that user will still be present in the db
    $result = $adminObject->deleteEmployeeTrackDetails($desiredUserId, $desiredTrackId);
    if ($result) {
        // echo "Successfully deleted the record";
        $_SESSION['DeleteTrackStatus'] = 'success';
        // if everthing if well then redirecting the user to login page
        $desiredLocation = "trackEmployee.php?id=" . $desiredUserId;
        header("Location: $desiredLocation");
    }
} else {
    echo "User Id or Track ID parameter is missing.";
}
