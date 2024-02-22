<?php

// PHP strcasecmp() Function
// The strcasecmp() function compares two strings.

// Tip: The strcasecmp() function is binary-safe and case-insensitive.

// Tip: This function is similar to the strncasecmp() function, with the difference that you can specify the number of characters from each string to be used in the comparison with strncasecmp().

// Syntax
// strcasecmp(string1,string2)

echo strcasecmp("SOham", "soham"); // 0 -> EQUAL
echo strcasecmp("SOHAM", "soham"); // 0 -> EQUAL
echo strcasecmp("SOham", "sOhaM"); // 0 -> EQUAL

echo "<br>";
// Return Value:	This function returns:
// 0 - if the two strings are equal
// <0 - if string1 is less than string2
// >0 - if string1 is greater than string2

echo strcasecmp("SOham", "sOha"); // 1 -> 1 character missmatch
echo "<br>";
echo strcasecmp("SOham", "shaoo0"); // 7
echo "<br>";
echo strcasecmp("SOham", "sOh"); // 2 
echo "<br>";
echo strcasecmp("am", "sOh"); // -18
echo "<br>";
