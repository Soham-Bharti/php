<?php
// include 'index.php';
// var_dump($flag);
date_default_timezone_set("Asia/Kolkata");
echo "You data... <br>";
if (isset($_POST['submit'])) {
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $country = $_POST['userCountry'];
    $mobile = $_POST['userMobile'];
    $dob = $_POST['userDoB'];
    $state = $_POST['userState'];
    $gender = $_POST['userGender'];
    $skills = $_POST['userSkills'];
    $password = $_POST['userPassword'];
    $re_password = $_POST['userReEnteredPassword'];
    $registrationDateTime = date('d-M-Y H:i:s');

    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Country: $country<br>";
    echo "Mob: $mobile<br>";
    $userDob = date_create($dob);
    $todaysDate = date_create('now');
    $diff = date_diff($userDob, $todaysDate);
    echo "Dob: $dob, Your age is: " . $diff->format("%y years %a days %H hours %Iminutes %S seconds") . "<br>";
    echo "State: $state<br>";
    $userSkills = implode(', ', $skills);
    echo "Gender: $gender<br>";
    echo "Skills: $userSkills<br>";
    echo "Password: $password<br>";
    echo "Re-Entered Password: $re_password<br>";
    echo "Registration Done at: " . date('d-m-Y H:i:s');
}
