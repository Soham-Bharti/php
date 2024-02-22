<?php

// preg_match_all()
// The preg_match_all() function will tell you how many matches were found for a pattern in a string.

$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str) . "<br>"; // 4

$statement = "My name is Soham Bharti";
$pattern = "/am/";
echo preg_match_all($pattern, $statement) . "<br>"; // 2

$statement = "My name is SOHAM BHARTI";
$pattern = "/am/";
echo preg_match_all($pattern, $statement) . "<br>"; // 1

$statement = "My name is SOHAM BHARTI";
$pattern = "/am/i";
echo preg_match_all($pattern, $statement) . "<br>"; // 2

$statement = "My name is SOHAM BHARTI";
$pattern = "//";
echo preg_match_all($pattern, $statement) . "<br>"; // 24


$num = 12345678;
$pattern = '/ /';
echo preg_match_all($pattern, $num) . "<br>"; // 0

$num = 12345678;
$pattern = '//';
echo preg_match_all($pattern, $num) . "<br>"; // 9
