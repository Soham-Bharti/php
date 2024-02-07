<?php

// PHP Cookies
// A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values.

// Syntax
// setcookie(name, value, expire, path, domain, secure, httponly);
$cookie_name = "user";
$cookie_value = "Soham Bharti";
print_r($_COOKIE);
setcookie($cookie_name, $cookie_value, time() + (86400 / 2), "/"); // 86400 = 1 day
// unset($_COOKIE['user']);
?>
<html>

<body>

    <!-- <?php
            if (!isset($_COOKIE[$cookie_name])) {
                echo "Cookie named '" . $cookie_name . "' is not set!";
            } else {
                echo "Cookie '" . $cookie_name . "' is set!<br>";
                echo "Value is: " . $_COOKIE[$cookie_name];
            }
            ?> -->


</body>

</html>
<?php
setcookie("user", "", time() - 86400); // cookie not deleted
// unset($_COOKIE['user']);
// unset($_COOKIE['test_cookie']);
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai [user] => Soham Bharti ) 
// echo "Cookie 'user' is deleted.";
var_dump(isset($_COOKIE["user"])); // bool(true)


setcookie("user", "", time() - 86400, '/'); // cookie deleted
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai ) 
?>
<!-- <html>

<body>

    <?php
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
    } else {
        echo "Cookies are disabled.";
    }
    ?>

</body>

</html> -->