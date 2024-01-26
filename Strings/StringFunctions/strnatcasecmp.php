<?php

// PHP strnatcasecmp() Function
// The strnatcasecmp() function compares two strings using a "natural" algorithm.

// In a natural algorithm, the number 2 is less than the number 10. In computer sorting, 10 is less than 2, because the first number in "10" is less than 2.


// Syntax
// strnatcasecmp(string1,string2)


// Return Value:	This function returns:
// 0 - if the two strings are equal
// <0 - if string1 is less than string2
// >0 - if string1 is greater than string2

echo strnatcasecmp("2Hello world!", "10Hello WORLD!"); // -1
echo "<br>";
echo strnatcasecmp("10Hello world!", "2Hello WORLD!"); // 1
echo "<br>";


$arr1 = $arr2 = array("pic1", "pic2", "pic10", "pic01", "pic100", "pic20", "pic30", "pic200");
echo "Standard string comparison" . "<br>";
usort($arr1, "strcmp");

print_r($arr1);
echo "<br>";

echo "Natural order string comparison" . "<br>";
usort($arr2, "strnatcmp");

print_r($arr2);
