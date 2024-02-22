<?php

// PHP md5() Function
// Calculates the MD5 hash of a string

// Syntax
// md5(string, raw)

$str = "Hello";
echo md5($str) . "<br>"; // 8b1a9953c4611296a827abf8c47804d7

$password = "Password@1234";
echo md5($password) . "<br>"; // 0f1ba603c1a843a3d02d6c5038d8e959

$confirmPassword = "0f1ba603c1a843a3d02d6c5038d8e959";
if ($confirmPassword === "0f1ba603c1a843a3d02d6c5038d8e959") {
    echo "Passwords matched!";
} else {
    echo "Passwords did not match!";
}


echo "<br>";
$str = "Hello";
echo "The string: ".$str."<br>";
echo "TRUE - Raw 16 character binary format: ".md5($str, TRUE)."<br>";
echo "FALSE - 32 character hex number: ".md5($str)."<br>";