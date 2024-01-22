<?php

// PHP md5_file() Function
// Calculates the MD5 hash of a file

// Syntax
// md5_file(file,raw)

$fileName = "index.html"; // File created Strings\StringFunctions\index.html
echo md5_file($fileName) . "<br>"; // 2ec3ea30c307942126cb41f7d6ea0ac3


// Storing the MD5 hash of "test.txt" in a file:
$md5file = md5_file("index.html");
file_put_contents("md5file.txt", $md5file);

// Test if "test.txt" has been changed (that is if the MD5 hash has been changed):
$md5file = file_get_contents("md5file.txt");
if (md5_file("index.html") == $md5file) {
    echo "The file is ok.";
} else {
    echo "The file has been changed.";
}
