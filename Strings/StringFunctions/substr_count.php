<?php

// PHP substr_count() Function
// The substr_count() function counts the number of times a substring occurs in a string.

// Note: The substring is case-sensitive.


// Syntax
// substr_count(string,substring,start,length)

echo substr_count("Hello Soham, How is it going?", "Soham") . "<br>"; // 1
echo substr_count("Hello Soham, How is it going?", "soham") . "<br>"; // 0

echo substr_count("Hello , How is it going?", "soham") . "<br>"; // 0

$str = "This is nice";
echo strlen($str) . "<br>"; // Using strlen() to return the string length -> 12
echo substr_count($str, "is") . "<br>"; // The number of times "is" occurs in the string -> 2
echo substr_count($str, "is", 2) . "<br>"; // The string is now reduced to "is is nice" -> 2
echo substr_count($str, "is", 3) . "<br>"; // The string is now reduced to "s is nice" -> 1
echo substr_count($str, "is", 3, 3) . "<br>"; // The string is now reduced to "s i" -> 0
