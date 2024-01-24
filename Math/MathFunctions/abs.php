<?php

// PHP abs() Function
// The abs() function returns the absolute (positive) value of a number.

// Syntax
// abs(number);

$number = 90;
echo abs($number) . "<br>"; // 90 
$number = -90;
echo abs($number) . "<br>"; // 90 
$number = 9.90;
echo abs($number) . "<br>"; // 9.9
$number = -9.90;
echo abs($number) . "<br>"; // 9.9
$number = 0;
echo abs($number) . "<br>"; // 0
$number = -0;
echo abs($number) . "<br>"; // 0
$number = "-9";
echo abs($number) . "<br>"; // 9
$number = "-9e+6";
echo abs($number) . "<br>"; // 9000000
