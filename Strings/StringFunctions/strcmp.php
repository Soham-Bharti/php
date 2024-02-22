<?php

// PHP strcmp() Function
// The strcmp() function compares two strings.

// Note: The strcmp() function is binary-safe and case-sensitive.

// Tip: This function is similar to the strncmp() function, with the difference that you can specify the number of characters from each string to be used in the comparison with strncmp().


// Syntax
// strcmp(string1,string2)


// Return Value:	This function returns:
// 0 - if the two strings are equal
// <0 - if string1 is less than string2
// >0 - if string1 is greater than string2


echo strcmp("Soham", "soham") . "<br>"; // -1
echo strcmp("Soham", "Soham") . "<br>"; // 0
echo strcmp("soham", "Soham") . "<br>"; // 1

echo strcmp("Hello world!", "Hello world!") . "<br>"; // 0 -->the two strings are equal
echo strcmp("Hello world!", "Hello") . "<br>"; // 7 --> string1 is greater than string2
echo strcmp("Hello world!", "Hello world! Hello!") . "<br>"; // -7 --> string1 is less than string2
