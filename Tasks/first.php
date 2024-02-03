<?php
$name = $contact = $email = $dob = $city = $state = $gender = $address = "";
$emailErr = $contactErr = $dobErr = $nameErr = "";
$userSkills = [];
global $flag;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = true;
    // validation for name 
    if (empty($_POST['name'])) {
        $nameErr = "Name required";
        $name = "";
        $flag = false;
    } else {
        if ($flag) $name = $_POST['name'];
        // regex matching for name validation
        if (!preg_match("/^[A-z- ]*$/", $name)) {
            $nameErr = "Invalid name";
            $name = "";
            $flag = false;
        }
    }

    // validation for email
    if (empty($_POST['email'])) {
        $emailErr = "Email Required";
        $email = "";
        $flag = false;
    } else {
        $email = $_POST['email'];
        // regex matching for email validation
        if (!preg_match("/[a-z0-9]+@[a-z]+\.[a-z]+/", $email)) {
            $emailErr = "Invalid email";
            $email = "";
            $flag = false;
        }
    }

    // validation for contact
    if (empty($_POST['contact'])) {
        $contactErr = "Contact Required";
        $contact = "";
        $flag = false;
    } else {
        $contact = $_POST['contact'];
        // regex matching for contact validation
        if (!preg_match("/^\+91[6-9][0-9]{9,9}$/", $contact)) {
            $contactErr = "Invalid contact";
            $contact = "";
            $flag = false;
        }
    }

    // validation for dob
    if (empty($_POST['dob'])) {
        $dobErr = "DoB Required";
        $dob = null;
        $flag = false;
    } else {
        $dob = $_POST['dob'];
        // regex matching for contact validation
        if (!preg_match("/^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/", $dob)) {
            $dobErr = "Invalid DoB";
            $dob = null;
            $flag = false;
        }
    }

    if (isset($_POST['city'])) {
        $city = $_POST['city'];
    } else {
        $city = "";
        $flag = false;
    }
    if (isset($_POST['state'])) {
        $state = $_POST['state'];
    } else {
        $state = "";
        $flag = false;
    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = "";
        $flag = false;
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $address = "";
        $flag = false;
    }

    if (!empty($_POST['skills'])) {
        foreach ($_POST['skills'] as $x) {
            array_push($userSkills, $x);
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>

<body>
    <h3>This is my first HTML Form Making.</h3>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        Name: <input type="text" name="name">
        <span class="red">*<?php echo $nameErr; ?></span>
        <br>
        Address: <input type="text" name="address">
        <br>
        <div>
            Gender:
            Male <input type="radio" name="gender" value="male">
            Female <input type="radio" name="gender" value="female">
        </div>

        Email: <input type="text" name="email">
        <span class="red">*<?php echo $emailErr; ?></span>
        <br>
        Contact: <input type="text" name="contact">
        <span class="red">*<?php echo $contactErr; ?></span>
        <br>
        DoB: <input type="text" name="dob">
        <span class="red">*<?php echo $dobErr; ?></span>
        <br>
        <div>
            Please select your state:
            <select name="state">
                <option value="">select</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Bihar">Bihar</option>
                <option value="Gujrat">Gujrat</option>
                <option value="Assam">Assam</option>
            </select>
        </div>
        <br>
        <div>
            Please select your city:
            <select name="city">
                <option value="">select</option>
                <option value="Bhopal">Bhopal</option>
                <option value="Patna">Patna</option>
                <option value="Ahemdabad">Ahemdabadujrat</option>
                <option value="Dispur">Dispur</option>
            </select>
        </div>
        <br>
        <div>
            Skills:
            <input type="checkbox" name="skills[]" value="Java"> Java
            <input type="checkbox" name="skills[]" value="PHP"> PHP
            <input type="checkbox" name="skills[]" value="MySQL"> MySQL
            <input type="checkbox" name="skills[]" value="Python"> Python
        </div>
        <input type="submit">
    </form>
</body>

</html>

<?php
if ($flag) {
    echo "<hr><b>Output</b><br>";
    echo $name . "<br>";
    echo $address . "<br>";
    echo $gender . "<br>";
    echo $email . "<br>";
    echo $contact . "<br>";
    echo $dob . "<br>";
    echo $state . "<br>";
    echo $city . "<br>";
    echo "Skills: ";
    if (!empty($userSkills)) {
        print_r($userSkills);
    }
}
?>