<?php
session_start();
require '../../Classes/Admin.php';
$adminObject = new Admin();

// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../start/login.php');
}

if (isset($_GET['id'])) $desiredUserId = $_GET['id'];
if (isset($desiredUserId)) {
    // $sql = "DELETE from users where id = '$desiredUserId'";
    // updating the deleted_at time to current timestamp in database so that user will still be present in the db
    $result = $adminObject -> deleteEmployee($desiredUserId);
    if ($result) {
        // echo "Successfully deleted the record";
        $_SESSION['DeleteStatus'] = 'success';
        // if everthing if well then redirecting the user to login page
        header("Location: viewAllEmployees.php");
    }
} else {
    echo "ID parameter is missing - check your session";
}
