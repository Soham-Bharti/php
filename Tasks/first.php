<?php
$name = $contact = $email = $dob = $city = $state = $gender = $address = "";
$emailErr = $contactErr = $dobErr = $nameErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validation for name 
    if (empty($_POST['name'])) {
        $nameErr = "Name required";
    } else {
        $name = $_POST['name'];
        // regex matching for name validation
        if (!preg_match("/^[A-z- ]*$/", $name)) {
            $nameErr = "Invalid name";
        }
    }

    // validation for email
    if (empty($_POST['email'])) {
        $emailErr = "Email Required";
    } else {
        $email = $_POST['email'];
        // regex matching for email validation
        if (!preg_match("/[a-z0-9]+@[a-z]+\.[a-z]+/", $email)) {
            $emailErr = "Invalid email";
        }
    }

    // validation for contact
    if (empty($_POST['contact'])) {
        $contactErr = "Contact Required";
    } else {
        $contact = $_POST['contact'];
        // regex matching for contact validation
        if (!preg_match("/^\+91[0-9]{10,10}$/", $contact)) {
            $contactErr = "Invalid contact";
        }
    }

    // validation for dob
    if (empty($$_POST['dob'])) {
        $dobErr = "DoB Required";
    } else {
        $dob = $_POST['dob'];
        // regex matching for contact validation
        if (!preg_match("/^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/", $dob)) {
            $dobErr = "Invalid DoB";
        }
    }

    if (isset($_POST['city'])) {
        $city = $_POST['city'];
    }
    if (isset($_POST['state'])) {
        $state = $_POST['state'];
    }
    if (isset($_POST['state'])) {
        $gender = $_POST['gender'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
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
        form {
            /* width: 260px; */
        }

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
                <option value="Ahemdabad">GAhemdabadujrat</option>
                <option value="Dispur">Dispur</option>
            </select>
        </div>
        <br>
        <input type="submit">
    </form>
</body>

</html>

<?php
echo "<hr><b>Output</b><br>";
echo $name . "<br>";
echo $address . "<br>";
echo $gender . "<br>";
echo $email . "<br>";
echo $contact . "<br>";
echo $dob . "<br>";
echo $state . "<br>";
echo $city . "<br>";
?>