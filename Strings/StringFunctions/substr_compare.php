<?php

// PHP substr_compare() Function
// The substr_compare() function compares two strings from a specified start position.

// Tip: This function is binary-safe and optionally case-sensitive.

// Syntax
// substr_compare(string1,string2,startpos,length,case)


$str1 = "Hello World!";
$str2 = "Hello Soham!";

echo substr_compare($str1, $str2, 0) . "<br>"; // 1

// Return Value:	This function returns:
// 0 - if the two strings are equal
// <0 - if string1 (from startpos) is less than string2
// >0 - if string1 (from startpos) is greater than string2

echo substr_compare($str1, $str2, 0, 5) . "<br>"; // 0
echo substr_compare($str1, $str2, 0, 6) . "<br>"; // 0


echo substr_compare($str1, $str2, 0) . "<br>"; // 1
$str2 = "Hello wORLD";
echo substr_compare($str1, $str2, 0, true) . "<br>"; // 0 -> true means case insensitive comparison
