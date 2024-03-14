<?php
session_start();
require_once '../config/dbConnect.php';
$_SESSION['userName']  =  '';
$_SESSION['adminLoggedIn']  =  false;
$_SESSION['userLoggedIn']  =  false;
$_SESSION['empUserId'] = '';
$_SESSION['adminUserId'] = '';

$email = $password = "";
$emailErr = $passwordErr = $invalidCredentialsErr = "";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// print_r($_SESSION);
$flag = true;

if (isset($_POST['submit'])) {
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    if (empty($_POST["email"])) {
        $emailErr = "Required";
        $flag = false;
    } else {
        if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+(@gmail.com)$/", $email)) {
            $emailErr = "Invalid email";
            $flag = false;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Required";
        $flag = false;
    }

    if ($flag) {
        $hashedPassword = md5(
            $password
        );
        $sql = "SELECT * from users where email='$email' and password='$hashedPassword'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            // echo "Login success";
            while ($row = mysqli_fetch_assoc($result)) {
                $userName = $row['name'];
                $role = $row['role'];
                $userId = $row['id'];
            }
            if ($role == 'admin') {
                $_SESSION['adminName']  =  $userName;
                $_SESSION['adminLoggedIn']  =  true;
                $_SESSION['adminUserId']     =  $userId;
                header('Location: adminDashboard.php');
            } else {
                $_SESSION['userName']   =  $userName;
                $_SESSION['empUserId']     =  $userId;
                $_SESSION['userLoggedIn']  =  true;
                header('Location: userDashboard.php');
            }
        } else {
            $invalidCredentialsErr = 'Invalid credentials';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Login</title>
    <link rel="stylesheet" href="login.css">
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
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Back</a>
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
    <h2 class="text-center mt-2">Welcome back</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <span><?php echo $invalidCredentialsErr ?></span>
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
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
                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Login">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>