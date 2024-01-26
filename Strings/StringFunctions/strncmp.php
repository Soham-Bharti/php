<?php

// PHP strncmp() Function
// The strncmp() function compares two strings.

// Note: The strncmp() is binary-safe and case-sensitive.

// Tip: This function is similar to the strcmp() function, except that strcmp() does not have the length parameter.

// Syntax
// strncmp(string1,string2,length)

echo strncmp("Hello world!", "Hello earth!", 6); //0
echo "<br";

echo strncmp("Hello world!", "hello earth!", 6); // -32
echo "<br>";

echo strncmp("Hello", "Hello", 6); // 0
echo "<br>";

echo strncmp("Hello", "hELLo", 6); // -32
echo "<br>";


// Return Value:	This function returns:
// 0 - if the two strings are equal
// <0 - if string1 is less than string2
// >0 - if string1 is greater than string2