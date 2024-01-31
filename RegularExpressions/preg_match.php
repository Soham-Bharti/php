<?php

// Using preg_match()
// The preg_match() function will tell you whether a string contains matches of a pattern.


// Returns 1 if the pattern matches, 0 otherwise

$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str) . "<br>"; // 1

$str = "Visit W3Schools W3Schools W3Schools W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str) . "<br>"; // 1

$str = "Visit 'W3Schools'";
$pattern = "/'w3schools'/i";
echo preg_match($pattern, $str) . "<br>"; // 1

$str = "Visit W3Schools";
$pattern = "/w3schools/";
echo preg_match($pattern, $str) . "<br>"; // 0

$number = 98989394794;
$pattern = "//";
echo preg_match($pattern, $str) . "<br>"; // 1

$pattern = "/0/";
echo preg_match($pattern, $str) . "<br>"; // 0

// Delimiter must not be alphanumeric or backslash
$pattern = "/9/8/";
echo preg_match($pattern, $str) . "<br>"; // warings 

// Delimiter must not be alphanumeric or backslash
$pattern = "/98/";
echo preg_match($pattern, $str) . "<br>"; // 0 -> as it doesn't work