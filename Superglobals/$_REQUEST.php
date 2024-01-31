<html>

<body>

    <form method="post" action="$_REQUEST.php">
        Name: <input type="text" name="fname">
        <input type="submit">
    </form>

    <form action="$_REQUEST.php" method="get"></form>
    <a href="$_REQUEST.php?subject=PHP&web=W3schools.com">Test $GET</a>
    <?php


    // $_REQUEST
    // $_REQUEST is a PHP super global variable which contains submitted form data, and all cookie data.

    // In other words, $_REQUEST is an array containing data from $_GET, $_POST, and $_COOKIE.


    // isset() checks if a variable has a value, including False, 0 or empty string, but not including NULL. Returns TRUE if var exists and is not NULL; FALSE otherwise.

    // empty() does a reverse to what isset does (i.e. !isset()) and an additional check, as to whether a value is "empty" which includes an empty string, 0, NULL, false, or empty array or object False. Returns FALSE if var is set and has a non-empty and non-zero value. TRUE otherwise


    // if (isset($_REQUEST['fname'])) {
    //     $name = $_REQUEST['fname'];
    //     echo $name;
    // } else {
    //     echo 'Please enter a valid name';
    // }


    // Using $_REQUEST on $_POST Requests

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_REQUEST['fname']);
        if (empty($name)) {
            echo "Name is empty";
        } else {
            echo $name;
        }
    }

    ?>
    <?php



    // Using $_REQUEST on $_GET Requests
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_REQUEST['subject']) && isset($_REQUEST['web']))
            echo "Study " . $_REQUEST['subject'] . " at " . $_REQUEST['web'];
    }
    ?>

</body>

</html>