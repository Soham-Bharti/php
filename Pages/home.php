<?php
session_start();
if (isset($_SESSION['adminLoggedIn'])) {
    $_SESSION['adminLoggedIn'] = false;
    $_SESSION['userLoggedIn'] = false;
}
unset($_SESSION['userName']);
unset($_SESSION['id']);
unset($_SESSION['role']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Styles/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class='col-md-2'>
                <a href="home.php" class="svg text-decoration-none d-flex align-items-center">
                    <img src="../Images/emp.svg" alt='svg here' class='w-25'>
                    <span class='text-success fw-bold'>EmployeeTracker.com</span>
                </a>
            </div>
            <div class="collapse navbar-collapse mx-1">
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