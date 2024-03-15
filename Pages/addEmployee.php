<?php
session_start();
require '../config/dbConnect.php';

$name = $email = $dob = $confirm_password = $password = $gender = $mobile = $image = $address = "";
$nameErr = $emailErr = $dobErr = $confirm_passwordErr = $passwordErr = $genderErr = $mobileErr = $imageErr = $cityErr = $stateErr = $addressErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$flag = true;
if (isset($_POST['submit'])) {
    // print_r($_POST);
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $dob = test_input($_POST['dob']);
    // $role = test_input($_POST['role']);
    $role = 'employee';
    $password = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);
    $gender = test_input($_POST['gender']);
    $mobile = test_input($_POST['mobile']);
    $address = test_input($_POST['address']);
    $city = test_input($_POST['city']);
    $state = test_input($_POST['state']);

    if (empty($name)) {
        $nameErr = 'Required';
        $flag = false;
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $flag = false;
        }
    }

    if (empty($email)) {
        $emailErr = 'Required';
        $flag = false;
    } else {
        if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+(@gmail.com)$/", $email)) {
            $emailErr = "Invalid email format";
            $flag = false;
        }
    }

    if (empty($password)) {
        $passwordErr = 'Required';
        $flag = false;
    }
    // else {
    //     $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    //     if (!preg_match($password_regex, $password)) {
    //         $passwordErr = "Check that a password:<br>
    //         Has minimum 8 characters in length<br>
    //         At least one uppercase English letter<br>
    //         At least one lowercase English letter<br>
    //         At least one digit<br>
    //         At least one special character";
    //         $flag = false;
    //     }
    // }

    if (empty($confirm_password)) {
        $confirm_passwordErr = 'Required';
        $flag = false;
    } else {
        if ($confirm_password !== $password) {
            $confirm_passwordErr = "Password Mismatch";
            $flag = false;
        }
    }

    if (empty($gender)) {
        $genderErr = 'Required';
        $flag = false;
    }

    if (empty($mobile)) {
        $mobileErr = 'Required';
        $flag = false;
    } else {
        if (!preg_match("/^[6-9]{1}\d{9}$/", $mobile)) {
            $mobileErr = "Invalid mobile number";
            $flag = false;
        }
    }

    if (empty($dob)) {
        $dobErr = 'Required';
        $flag = false;
    } else {
        $year = explode('-', $dob);
        if ($year[0] > 2010) {
            $dobErr = 'Choose a DoB before 2010';
            $flag = false;
        }
    }

    if (empty($city)) {
        $cityErr = 'Required';
        $flag = false;
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
            $flag = false;
        }
    }

    if (empty($state)) {
        $stateErr = 'Required';
        $flag = false;
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $state)) {
            $stateErr = "Only letters and white space allowed";
            $flag = false;
        }
    }

    if (empty($address)) {
        $addressErr = 'Required';
        $flag = false;
    }

    if (empty($_FILES['image'])) {
        $imageErr =  "Required";
        $flag = false;
    } else {
        if ($flag) {
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];
            $fileExtension = explode('.', $fileName);
            $fileActualExtension = strtolower(end($fileExtension)); // jpeg

            $allowed = array('jpeg', 'jpg', 'png');

            if (in_array($fileActualExtension, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 50000000000) { // 500kb =  500000b 
                        $nameArr = explode(' ', $name);
                        $fileNameNew = strtolower($nameArr[0])."_" . uniqid('', true) . "." . $fileActualExtension;
                        $fileDestination = '../Images/' . $fileNameNew;
                        if (!file_exists($fileName)) {
                            if (move_uploaded_file(
                                $fileTmpName,
                                $fileDestination
                            )) {
                                // echo "Successfully uploaded your image";
                            } else {
                                $imageErr =  "Failed to upload your image";
                                $flag = false;
                            }
                        } else {
                            $imageErr = "File already exists!";
                            $flag = false;
                        }
                    } else {
                        $imageErr = "FILE  TOO LARGE!";
                        $flag = false;
                    }
                } else {
                    $imageErr = "There was file error";
                    $flag = false;
                }
            } else {
                $imageErr = "Only .png, .jpg, .jpeg supported";
                $flag = false;
            }
        }
    }

    // print_r($_POST);

    if ($flag) {
        // sending data to data base
        $hashedPassword = md5($password);
        $sql = "INSERT INTO users(role, name, email, password, gender, mobile, date_of_birth, address, city, state, profile_url)
                values('$role', '$name','$email', '$hashedPassword', '$gender', '$mobile', '$dob', '$address', '$city', '$state', '$fileNameNew')";

        if (mysqli_query($conn, $sql)) {
            // echo "<br>New record inserted successfully<br>";
        } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);
        mysqli_close($conn);
        // if everthing if well then redirecting the user to login page
        $_SESSION['AddStatus'] = 'success';
        header("Location: adminDashboard.php");
    } else echo "THERE WAS AN ERROR adding new employee";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Registration</title>
    <link rel="stylesheet" href="../Styles/addEmployee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://soham-bharti.netlify.app/" target="_blank">Employee Tracker WebApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- Here http://localhost/php_training/Pages is static for the moment -->
                        <a class="nav-link" aria-current="page" href="home.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminDashboard.php">Back</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-2">New <span class='text-info'>Employee</span> Registration</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post" enctype="multipart/form-data">
                <!-- <div class="mb-3">
                    <label class="col-form-label"> Register as</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option value="admin" disabled>Admin</option>
                        <option value="employee" selected>Employee</option>
                    </select>
                </div> -->
                <div class="mb-3">
                    <label class="col-form-label">Name <span>* <?php echo $nameErr ?></span></label>
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Joey Tribbiani">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address <span>* <?php echo $emailErr ?></span></label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">Password <span>* <?php echo $passwordErr ?></span></label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">Confirm Password <span>* <?php echo $confirm_passwordErr ?></span></label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="confirm_password" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-auto">
                        <label for="gender" class="col-form-label">Gender <span>* <?php echo $genderErr ?></span></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="female">
                        <label class="form-check-label" for="gender">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="male" checked>
                        <label class="form-check-label" for="gender">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="others">
                        <label class="form-check-label" for="gender">Others</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile <span>* <?php echo $mobileErr ?></span></label>
                    <input type="tel" name="mobile" class="form-control" placeholder="9876543210" maxlength="10">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth <span>* <?php echo $dobErr ?></span></label>
                    <input type="date" class="form-control" name="dob">
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Piture <span>* <?php echo $imageErr ?></span></label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address <span>* <?php echo $addressErr ?></span></label>
                    <input type="text" class="form-control" name="address" placeholder="628 Iskon Emporio">
                </div>
                <div class="mb-3">
                    <label class="form-label">City <span>* <?php echo $cityErr ?></span></label>
                    <input type="text" class="form-control" name="city" placeholder="Ahemdabad">
                </div>
                <div class="mb-3">
                    <label class="form-label">State <span>* <?php echo $stateErr ?></span></label>
                    <input type="text" class="form-control" name="state" placeholder="Gujarat">
                </div>

                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Register">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>