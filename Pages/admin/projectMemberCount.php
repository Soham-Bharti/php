<?php
session_start();
require '../../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../common/login.php');
}
if(isset($_POST["submit"])) {
    if (isset($_POST['numberOfMembers'])) $desiredNumberOfMembers = $_POST['numberOfMembers'];
    if (isset($_POST['projectId'])) $desiredProjectId = $_POST['projectId'];
    header("Location: addProjectMember.php?id=" . $desiredProjectId . "&num=" . $desiredNumberOfMembers);
}