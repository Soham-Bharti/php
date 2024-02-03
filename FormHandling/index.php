<?php

// PHP Form Handling
// The PHP superglobals $_GET and $_POST are used to collect form-data.

/*
GET vs. POST
Both GET and POST create an array (e.g. array( key1 => value1, key2 => value2, key3 => value3, ...)). This array holds key/value pairs, where keys are the names of the form controls and values are the input data from the user.

Both GET and POST are treated as $_GET and $_POST. These are superglobals, which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.
*/


// $_GET is an array of variables passed to the current script via the URL parameters.
if (isset($_GET["userName"]) && $_GET["userEmail"]) {

    // print_r($_GET); // Array ( [userName] => soham bharti [userEmail] => sohamom2730@gmail.com )
    echo "<b>Your info from \$_GET[] Method</b><br><hr>";
    echo "Welcome: " . $_GET["userName"] . "<br>";
    echo "Your email is: " . $_GET["userEmail"] . "<br>";
}


// $_POST is an array of variables passed to the current script via the HTTP POST method.
if (isset($_POST["userDoB"]) && isset($_POST["userPassword"])) {

    // print_r($_POST); // Array ( [userDoB] => 2024-02-03 [userPassword] => 1234 )
    echo "<b>Your info from \$_POST[] Method</b><br><hr>";
    echo "Your DoB is " . $_POST["userDoB"] . "<br>";
    echo "Your Password is " . $_POST["userPassword"] . "<br>";
}
