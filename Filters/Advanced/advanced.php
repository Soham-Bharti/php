<?php

// PHP Filters Advanced

// Validate an Integer Within a Range

$age = 12;
if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 115)))) {
    echo "Your age is valid";
} else echo "Your age is invalid";
// Your age is valid



$age = 0;
if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 115)))) {
    echo "Your age is valid";
} else echo "Your age is invalid";
// Your age is invalid


$int = 10;

if (filter_var($int, FILTER_VALIDATE_INT)) {
    echo ("Integer is valid");
} else {
    echo ("Integer is not valid");
}
// Integer is valid


$int = 0;

if (filter_var($int, FILTER_VALIDATE_INT) === 0 || filter_var($int, FILTER_VALIDATE_INT)) {
    echo ("Integer is valid");
} else {
    echo ("Integer is not valid");
}
// Integer is invalid



// Validate an IP Address
$ip = "127.0.0.1";

if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
    echo ("$ip is a valid IP address");
} else {
    echo ("$ip is not a valid IP address");
}
// 127.0.0.1 is a valid IP address

echo "<br>";
// Sanitize and Validate an Email Address
$email = "<h1>soham.bharti@example.com";

// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo ("$email is a valid email address");
} else {
    echo ("$email is not a valid email address");
}
// h1soham.bharti@example.com is a valid email address

echo "<br>";

// Sanitize and Validate a URL
$url = "ht2tps//www.w3schools.com";

// Remove all illegal characters from a url
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo ("URL is a valid URL");
} else {
    echo ("URL is not a valid URL");
}
// URL is not a valid URL



$url = "ht2tps://www.w3schools.com";

// Remove all illegal characters from a url
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo ("URL is a valid URL");
} else {
    echo ("URL is not a valid URL");
}
// URL is a valid URL



// *** Advance ***
// Validate IPv6 Address
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
    echo ("$ip is a valid IPv6 address");
} else {
    echo ("$ip is not a valid IPv6 address");
}
// 2001:0db8:85a3:08d3:1319:8a2e:0370:7334 is a valid IPv6 address

$ip = "2001:0adb8:85a3:08d3:1319:8a2e:0370:7334";

if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
    echo ("$ip is a valid IPv6 address");
} else {
    echo ("$ip is not a valid IPv6 address");
}
// 2001:0adb8:85a3:08d3:1319:8a2e:0370:7334 is not a valid IPv6 address

echo "<br>";

// Validate URL - Must Contain QueryString
$url = "https://www.w3schools.com";

if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
    echo ("$url is a valid URL with a query string");
} else {
    echo ("$url is not a valid URL with a query string");
}
// https://www.w3schools.com is not a valid URL with a query string

echo "<br>";

// Variable to check
$url = "https://www.w3schools.com?name='soham'";

// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
    echo ("$url is a valid URL with a query string");
} else {
    echo ("$url is not a valid URL with a query string");
}

// https://www.w3schools.com?name='soham' is a valid URL with a query string

echo "<br>";

// Remove Characters With ASCII Value > 127
$str = "<h1>Hello WorldÆØÅ!</h1>";
var_dump(filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)); // string(12) "Hello World!"
