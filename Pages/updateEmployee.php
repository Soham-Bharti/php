<?php
session_start();
require '../config/dbConnect.php';
// print_r($_SESSION);
$nameErr = $emailErr = $dobErr = $genderErr = $mobileErr = $imageErr = $cityErr = $stateErr = $addressErr = "";
if (isset($_SESSION['empUserId'])) {
    $desiredUserId = $_SESSION['empUserId'];
    $sql = "SELECT name, email, gender, mobile, date_of_birth, address, city, state, profile_url from users where id = '$desiredUserId' and deleted_at is null";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $dob = $row['date_of_birth'];
            $gender = $row['gender'];
            $mobile = $row['mobile'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $profile = $row['profile_url'];
        }
    }
} else {
    echo "Emp User ID parameter is missing - check your session";
}


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

// print_r($_FILES['image']);
        if ($flag && $_FILES['image']['name'] !== '') {
            // echo 'Inside';
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
                        $fileNameNew = strtolower($nameArr[0]) . "_" . uniqid('', true) . "." . $fileActualExtension;
                        $fileDestination = './Images/' . $fileNameNew;
                        // echo "LOCATION___" . $fileDestination;
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

    // print_r($_POST);

    if ($flag) {
        // sending data to data base  except LOAD_FILE('$fileDestination')
        if (empty($fileDestination)) {
            $sql = "UPDATE users
            SET name = '$name',  email='$email', mobile='$mobile' , address= '$address', gender = '$gender', date_of_birth = '$dob', city = '$city', state = '$state', updated_at = now()
            where id = '$desiredUserId'
            ";
        } else {
            $sql = "UPDATE users
            SET name = '$name',  email='$email', mobile='$mobile' , address= '$address', gender = '$gender', date_of_birth = '$dob', city = '$city', state = '$state', profile_url = '$fileNameNew', updated_at = now()
            where id = '$desiredUserId'
            ";
        }

        if (mysqli_query($conn, $sql)) {
            echo "<br>Record updated successfully<br>";
        } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);
        mysqli_close($conn);
        // if everthing if well then redirecting the user to login page
        $_SESSION['UpdateStatus'] = 'success';
        header("Location: adminDashboard.php");
        // echo "Successfully updated";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link rel="stylesheet" href="./Styles/updateemployee.css">
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
    <h2 class="text-center mt-2"><span class='text-info'>Update</span> Employee Details</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="col-form-label">Name <span>* <?php echo $nameErr ?></span></label>
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Joey Tribbiani" value='<?php echo $name ?>'>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address <span>* <?php echo $emailErr ?></span></label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com" value='<?php echo $email ?>'>
                </div>

                <div class="mb-3">
                    <div class="col-auto">
                        <label for="gender" class="col-form-label" checked='<?php echo $gender ?>'>Gender <span>* <?php echo $genderErr ?></span></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="female" <?php echo $gender == 'female' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="gender">Female</label>
                    </div>


                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="male" <?php echo $gender == 'male' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="gender">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="others" <?php echo $gender == 'others' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="gender">Others</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile <span>* <?php echo $mobileErr ?></span></label>
                    <input type="tel" name="mobile" class="form-control" placeholder="9876543210" maxlength="10" value='<?php echo $mobile ?>'>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth <span>* <?php echo $dobErr ?></span></label>
                    <input type="date" class="form-control" name="dob" value='<?php echo $dob ?>'>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Picture <span>* (displaying your current profile, CHOOSE only if you want to change) <?php echo $imageErr ?></span></label>
                    <div class="d-inline-block profile-img w-25">
                        <img src="<?php echo "./Images/".$profile ?>" alt="No profile to show" class="img-thumbnail object-fit-contain border rounded-circle  mb-2">
                    </div>
                    <input class="form-control" type="file" name="image">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address <span>* <?php echo $addressErr ?></span></label>
                    <input type="text" class="form-control" name="address" placeholder="628 Iskon Emporio" value='<?php echo $address ?>'>
                </div>
                <div class="mb-3">
                    <label class="form-label">City <span>* <?php echo $cityErr ?></span></label>
                    <input type="text" class="form-control" name="city" placeholder="Ahemdabad" value='<?php echo $city ?>'>
                </div>
                <div class="mb-3">
                    <label class="form-label">State <span>* <?php echo $stateErr ?></span></label>
                    <input type="text" class="form-control" name="state" placeholder="Gujarat" value='<?php echo $state ?>'>
                </div>

                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>
        </div>
    </div>
</body>

</html>