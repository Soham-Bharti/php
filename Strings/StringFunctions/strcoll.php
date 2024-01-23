<?php

// PHP strcoll() Function

// Definition and Usage
// The strcoll() function compares two strings.
// The comparison of the strings may vary depending on the locale settings (A<a or A>a).
// Note: The strcoll() is case-sensitive but not binary-safe.
// Note: If the current locale is C or POSIX, this function works the same way as strcmp().

// Syntax
// strcoll(string1,string2)

// Return Value:	This function returns:
// 0 - if the two strings are equal
// <0 - if string1 is less than string2
// >0 - if string1 is greater than string2

echo strcoll("Soham", "soham") . "<br>"; // -1
echo strcoll("Soham", "Soham") . "<br>"; // 0
echo strcoll("soham", "Soham") . "<br>"; // 1

echo strcoll("Hello world!", "Hello world!") . "<br>"; // 0 -->the two strings are equal
echo strcoll("Hello world!", "Hello") . "<br>"; // 1 --> string1 is greater than string2
echo strcoll("Hello world!", "Hello world! Hello!") . "<br>"; // -1 --> string1 is less than string2