<?php

// Name, email, Password, Re-enter Password, Mobile with country code aside in form of dropbox, Dob se age nikalo, Radio - Gender, Profile Pic in Gallery folder, Other docs in new folder named by email(username)_docs, Checkbox - Skills, ###store data in usersData.txt file 

// Print all data including profile pic in output.php

$name = $email = $dob = $pass2 = $pass = $gender = $mobile = "";
$nameErr = $emailErr = $dobErr = $pass2Err = $passErr = $genderErr = $mobileErr = "";


// Validations
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Inside validation..";
    if (empty($_POST["userName"])) {
        // already validated by form
    } else {
        $name = test_input($_POST["userName"]);
        echo "before valdation: $name<br>";
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";

            echo "validatnig...$name<br>";
            $flag = false;
        }
    }
    echo "after valdation: $name<br>";

    if (empty($_POST["userEmail"])) {
        // already validated by form
    } else {
        $email = test_input($_POST["userEmail"]);
        echo "before valdation: $email<br>";
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $flag = false;
        }
    }
    echo "after valdation: $email<br>";

    if (empty($_POST["userDoB"])) {
        // already validated by form
    } else {

        $dob = test_input($_POST["userDoB"]);
        echo "before valdation: $dob<br>";
        // check if dob is before 2015
        $year = explode('-', $dob);
        if ($year[0] > 2015) {
            $dobErr = 'Choose a DoB before 2015';
            echo $dobErr;

            $flag = false;
        }
    }
    echo "after valdation: $dob<br>";

    if (empty($_POST['userPassword'])) {
        // already handled by form
    } else {
        $pass = test_input($_POST['userPassword']);
        echo "before valdation: $pass<br>";
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if (!preg_match($password_regex, $pass)) {
            $passErr = "cheks that a password:<br>
            Has minimum 8 characters in length<br>
            At least one uppercase English letter<br>
            At least one lowercase English letter<br>
            At least one digit<br>
            At least one special character";
            $flag = false;
        }
    }
    echo "after valdation: $pass<br>";

    if (empty($_POST['userReEnteredPassword'])) {
        // already validated by form
    } else {
        // check if re-entered password is same as before one
        $pass2 = test_input($_POST['userReEnteredPassword']);
        echo "before valdation: $pass2<br>";
        if ($pass2 !== $pass) {
            $pass2Err = "Password missmatch!";
            $flag = false;
        }
    }
    echo "after valdation: $pass2<br>";

    if (empty($_POST["userGender"])) {
        // already validated by form
    } else {
        $gender = test_input($_POST["userGender"]);
    }
    echo "after valdation: $gender<br>";

    if (empty($_POST["userMobile"])) {
        // already validated by form
    } else {
        $mobile = test_input($_POST["userMobile"]);
        echo "before valdation: $mobile<br>";
        if (!preg_match("/^[6-9]{3}\d{7}$/", $mobile)) {
            $mobileErr = "Invalid mobile number";
            $flag = false;
        }
    }
    echo "after valdation: $mobile<br>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - <?php echo date('Y'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Hey, Wassup!</h2>
        <?php echo "Flag is " . $flag; ?>
        <form action="<?php echo $flag ? 'output.php' : $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div>
                Name: <input type="text" name="userName" placeholder="John Banega Don" required value="<?php echo $name ?>" />
                <span>* <?php echo $nameErr ?></span>
            </div>
            <div>
                Email: <input type="email" name="userEmail" required value="<?php echo $email ?>" />
                <span>* <?php echo $emailErr ?></span>
            </div>
            <div>
                Mobile:
                <select name="userCountry">
                    <option value="afghanistan">+93 (Afghanistan)</option>
                    <option value="australia">+61 (Australia)</option>
                    <option value="belgium">+32 (Belgium)</option>
                    <option value="india" selected>+91 (India)</option>
                    <option value="italy">+39 (Italy)</option>
                </select>
                <input type="tel" name="userMobile" placeholder="0123456789" value="<?php echo $mobile ?>" maxlength="10" required />
                <span>* <?php echo $mobileErr ?></span>
            </div>
            <div>
                DoB: <input type="date" name="userDoB" required value="<?php echo $dob ?>" />
                <span>* <?php echo $dobErr ?></span>
            </div>
            <div>
                State:
                <select name="userState" required>
                    <option value="andhra pradesh">Andhra Pradesh</option>
                    <option value="assam">Assam</option>
                    <option value="bihar" selected>Bihar</option>
                    <option value="goa">Goa</option>
                    <option value="gujrat">Gujrat</option>
                    <option value="madhya pradesh">Madhya Pradesh</option>
                    <option value="manipur">Manipur</option>
                    <option value="uttar pradesh">Uttar Pradesh</option>
                    <option value="west bengal">West Bengal</option>
                </select>
                <span>*</span>
            </div>
            <div>
                Gender:
                <input type="radio" name="userGender" value="male" required /> Male
                <input type="radio" name="userGender" value="female" required /> Female
                <input type="radio" name="userGender" value="others" required /> Others
                <span>*</span>
            </div>
            <div>
                Profile Pic: <input type="file" name="userProfile" />
            </div>
            <div>
                Skills:
                <input type="checkbox" name="userSkills[]" value="java" /> Java
                <input type="checkbox" name="userSkills[]" value="reactJS" /> ReactJS
                <input type="checkbox" name="userSkills[]" value="php" /> PHP
                <input type="checkbox" name="userSkills[]" value="nodeJS" /> NodeJS
                <input type="checkbox" name="userSkills[]" value="pyhton" /> Python
            </div>
            <div>
                Other Documents: <input type="file" name="userOtherDocs[]" multiple />
            </div>
            <div>
                Password: <input type="text" name="userPassword" required value="<?php echo $pass ?>" />
                <span>* <?php echo $passErr ?></span>
            </div>
            <div>
                Re-Enter Password: <input type="text" name="userReEnteredPassword" required value="<?php echo $pass2 ?>" />
                <span>* <?php echo $pass2Err ?></span>
            </div>
            <div>
                Above informations are correct to the best of my knowledge. <input type="checkbox" name="userAgreement" required /> I Agree
            </div>
            <div class="buttons">
                <input type="submit" name="submit" class="btn">
                <input type="reset" name="reset" class="btn">
            </div>
        </form>
    </div>
</body>

</html>