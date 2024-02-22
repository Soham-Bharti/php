<!DOCTYPE html>
<html>

<body>

    <!--  Query strings in the URL -->
    <a href="$_GET.php?subject=PHP&web=W3schools.com">Test $GET</a>

    <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="GET">
        Name: <input type="text" name="name">
        E-mail: <input type="text" name="email">
        <input type="submit">
    </form>


</body>

</html>
<?php


// $_GET
// $_GET contains an array of variables received via the HTTP GET method.

// There are two main ways to send variables via the HTTP GET method:

// Query strings in the URL
// HTML Forms


// Query strings in the URL
if (isset($_GET['subject']))
    echo "Study " . $_GET['subject'] . " at " . $_GET['web'];



// $_GET in HTML Forms
if (isset($_GET["name"]) && isset($_GET["email"])) {
    echo "Welcome " . $_GET["name"] . "<br>";
    echo "Your email is " . $_GET["email"];
}
?>