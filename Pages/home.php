<?php
session_start();
if (isset($_SESSION['adminLoggedIn']) || isset($_SESSION['adminLoggedIn'])) {
    $_SESSION['adminLoggedIn'] = false;
    $_SESSION['userLoggedIn'] = false;
}
unset($_SESSION['empUserId']);
unset($_SESSION['userId']);
$_SESSION['userName']  =  '';
$_SESSION['adminLoggedIn']  =  false;
$_SESSION['userLoggedIn']  =  false;
$_SESSION['empUserId'] = '';  
$_SESSION['adminUserId'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./Styles/home.css">
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
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo "http://localhost/php_training/Pages" ?>">Home</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <marquee direction="left" class='marquee display-5'>Welcome to Web Employee Tracker</marquee>
    <!-- <div class="container">
        <form action="register.php">
            <input type="submit" name="reg-submit" value="Register" class='btn btn-primary'>
        </form>
        <form action="login.php">
            <input type="submit" name="login-submit" value="Login">
        </form>
    </div> -->
</body>

</html>