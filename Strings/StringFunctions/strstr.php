<?php

// PHP strstr() Function
// The strstr() function searches for the first occurrence of a string inside another string.

// Note: This function is binary-safe.

// Note: This function is case-sensitive. For a case-insensitive search, use stristr() function.

// Syntax
// strstr(string,search,before_search)

echo strstr("Hello World", 'o'); // o World
echo "<br>";

echo strstr("Hello World", 'w'); // 
echo "<br>";

echo strstr("Hello World", 'o', true); // Hell
echo "<br>";

echo strstr("Hello World Hello World Hello World", 'o', true); // Hell
echo "<br>";

echo strstr("Hello World Hello World Hello World", 'o'); // o World Hello World Hello World
echo "<br>";
