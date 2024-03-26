<?php
session_start();
require '../../Classes/Project.php';
$projectObject = new Project();

// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../start/login.php');
}

if (isset($_GET['id'])) $desiredProjectId = $_GET['id'];

if (isset($desiredProjectId)) {
    // $sql = "DELETE from users where id = '$desiredUserId'";
    $result = $projectObject -> delete($desiredProjectId);
    if ($result) {
        // echo "Successfully deleted the record";
        $_SESSION['ProjectDeleteStatus'] = 'success';
        // if everthing if well then redirecting the user to login page
        header("Location: viewAllProjects.php");
    }
} else {
    echo "ID parameter is missing - check your session";
}
