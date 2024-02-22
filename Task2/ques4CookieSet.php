<?php

if (isset($_POST['submit'])) {

    // setting cookies
    $id = $_POST['empId'];
    $name = $_POST['empName'];
    setcookie("Emp_$id's_cookie", "Name: $name and Id: $id", time() + 10);
    echo "Cookie set successfully";
}
