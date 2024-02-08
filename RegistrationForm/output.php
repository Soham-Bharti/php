<?php
/*
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
*/


$txt = $_SERVER['REQUEST_URI'];
$userData = explode("?", $txt);
array_shift($userData);
date_default_timezone_set("Asia/Kolkata");
// echo "Your data... <br>";
// print_r($userData);

$name = ucwords(implode(' ', explode('%20', $userData[0])));
// echo "<br> $name <br>";

$email = $userData[1];
// echo $email . "<br>";

$dob = $userData[2];
// echo $dob;
$todaysDate = new DateTime('now');
$userDob = new DateTime($dob);
// print_r($todaysDate);
$diff = date_diff($userDob, $todaysDate);
// echo "Your age is: " . $diff->y . " years, " . $diff->m . " months, and " . $diff->d . " days. <br>";

$pass1 = $userData[3];
// echo "Entered Password $pass1 <br>";
$pass2 = $userData[4];
// echo "Re-Entered Password $pass1 <br>";

$gender = $userData[5];
// echo "Gender is $gender <br>";

$country = $userData[6];
// echo "Country is $country <br>";

$mobile = $userData[7];
// echo "Mobile is $mobile <br>";

$profileDir = $userData[8];
// echo "Profile Directory is $profileDir <br>";

$skills = implode(', ', array_slice($userData, 9));
// echo "Your skills are: $skills";

$dataFile = fopen('Data\allDatas.txt', 'a') or die('Can not open data.txt file');
fwrite(
    $dataFile,
    "Name: $name \nEmail: $email \nDoB: $dob \nGender: $gender \nProfileDir: $profileDir \nCountry: $country \nMobile: $mobile \nPassword: $pass1\nSkills: $skills\n#######################################\n"
);
fclose($dataFile);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Home</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
    <div class="container">
        <h2>Welcome <?php echo explode(' ', $name)[0] ?>!</h2>
        <img src="<?php echo $profileDir ?>" alt="profile picture here" class="proPic">
        <p>Country: <?php echo ucfirst($country); ?></p>
        <p>Mobile: <?php echo $mobile; ?></p>
        <p>Age: <?php echo $diff->y . " years, " . $diff->m . " months, and " . $diff->d . " days"; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Gender: <?php echo ucfirst($gender); ?></p>
        <p>Skills: <?php echo ucwords($skills); ?></p>

    </div>
</body>

</html>