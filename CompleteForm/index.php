<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $mobileErr = $dobErr = "";
$name = $email = $gender = $comment = $website = $mobile = $dob = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[A-z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile is required";
    } else {
        $mobile = test_input($_POST["mobile"]);
        // check if mobile number is valid
        if (!preg_match("/^[6-9]{1}\d{9}/", $mobile)) $mobileErr = "Invalid Mobile Number";
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Form</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="div">
        <form method="post" action=<?php echo (empty($name) || empty($email) || empty($mobile) || empty($dob)) ? 'index.php' : 'output.php'; ?>>
            <h2>PHP Form Validation Example</h2>
            <p><span class="error">* required field</span></p>
            Name
            <input type="text" name="name">
            <span class="error">* <?php echo $nameErr; ?></span>
            <!-- <br><br> -->
            E-mail <input type="text" name="email">
            <span class="error">* <?php echo $emailErr; ?></span>
            <!-- <br><br> -->
            Mobile <input type="tel" name="mobile">
            <span class="error">* <?php echo $mobileErr; ?></span>
            <!-- <br><br> -->
            Date Of Birth <input type="date" name="dob">
            <span class="error">* <?php echo $dobErr; ?></span>
            <!-- <br><br> -->
            Website <input type="text" name="website">
            <!-- <span class="error"><?php echo $websiteErr; ?></span> -->
            <!-- <br><br> -->
            Comment <textarea name="comment" rows="5" cols="40"></textarea>
            <!-- <br><br> -->
            Gender
            <div class="d-row">
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
                <span class="error">* <?php echo $genderErr; ?></span>
            </div>
            <!-- <br><br> -->
            <div class="d-row">
                <input type="submit" name="submit" value="Submit" class="button">
                <input type="reset" name="reset" value="Reset" class="button">
            </div>
        </form>
    </div>
</body>

</html>