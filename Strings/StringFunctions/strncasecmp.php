<?php

// PHP strncasecmp() Function
// The strncasecmp() function compares two strings.

// Note: The strncasecmp() is binary-safe and case-insensitive.

// Tip: This function is similar to the strcasecmp() function, except that strcasecmp() does not have the length parameter.

// Syntax
// strncasecmp(string1,string2,length)

echo strncasecmp("Hello world!", "hello earth!", 6); // 0
echo "<br>";

echo strncasecmp("Hello", "Hello", 6); // 0
echo "<br>";
echo strncasecmp("Hello", "hELLo", 6); // 0

echo "<br>";
echo strncasecmp("Hello", "hELo", 6); // -3
