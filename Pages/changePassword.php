<?php
session_start();
require '../config/dbConnect.php';
// print_r($_SESSION);
if($_SESSION['role'] !== "emp"){
    header("Location: login.php");
}

$confirmNewPassword = $newPassword = $oldPassword =  "";
$confirmNewPasswordErr = $newPasswordErr = $oldPasswordErr = "";

$desiredUserId = $_SESSION['id'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$flag = true;
if (isset($_POST['change'])) {
    $oldPassword = test_input($_POST['oldPassword']);
    $newPassword = test_input($_POST['newPassword']);
    $confirmNewPassword = test_input($_POST['confirmNewPassword']);

    if (empty($oldPassword)) {
        $oldPasswordErr = 'Required';
        $flag = false;
    } else {
        $hashedPassword = md5($oldPassword);
    }

    if (empty($newPassword)) {
        $newPasswordErr = 'Required';
        $flag = false;
    } else {
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

    }

    if (empty($confirmNewPassword)) {
        $confirmNewPasswordErr = 'Required';
        $flag = false;
    } else {
        if ($confirmNewPassword !== $newPassword) {
            $confirmNewPasswordErr = "Password Mismatch";
            $flag = false;
        }
    }

    if ($flag) {
        $sql = "SELECT password from users where id = '$desiredUserId' and deleted_at is null";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $userOldHashedPassword = $row['password'];
            }
        }
        if ($hashedPassword == $userOldHashedPassword) {
            // echo 'Password matched';
            $newHashedPassword = md5($newPassword);
            if ($newHashedPassword == $userOldHashedPassword) {
                $newPasswordErr = "New password can not be same as old password!";
            } else {
                $sql2 = "UPDATE users set password = '$newHashedPassword', updated_at = now() where id = '$desiredUserId'";
                if (mysqli_query($conn, $sql2)) {
                    echo "Password changed successfully!";
                    mysqli_close($conn);
                    $_SESSION['userChangePasswordStatus'] = 'success';
                    header("Location: userDashboard.php");
                } else {
                    $newPasswordErr =  "There was some Database Issue while updating your password!";
                    $oldPasswordErr =  "There was some Database Issue while updating your password!";
                    $confirmNewPasswordErr =  "There was some Database Issue while updating your password!";
                }
            }
        } else {
            $oldPasswordErr = "Password doesn't match";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changing Password...</title>
    <link rel="stylesheet" href="../Styles/updateemployee.css">
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
                        <a class="nav-link" href="userDashboard.php">Back</a>
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
    <h2 class="text-center mt-2">Change your current <span class='text-info'>Password</span></h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
                <div class="mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">Curent Password <span>* <?php echo $oldPasswordErr ?></span></label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="oldPassword" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">New Password <span>* <?php echo $newPasswordErr ?></span></label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="newPassword" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">Confirm Password <span>* <?php echo $confirmNewPasswordErr ?></span></label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="confirmNewPassword" class="form-control">
                    </div>
                </div>
                <div class="buttons">
                    <input type="submit" name="change" class="btn btn-dark btn-lg" value="Confirm">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg" value="Clear">
                </div>
            </form>
        </div>
    </div>

        <footer class="d-flex flex-wrap justify-content-between align-items-center m-3 p-3 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 - <?php echo date("Y") ?> Made with ❤️ - <span class='fw-bold'>Soham Bharti</span></p>

            <a href="home.php" class="col-1 svg">
                <img src="../Images/emp.svg" alt='svg here'>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
        </footer>
    
</body>

</html>