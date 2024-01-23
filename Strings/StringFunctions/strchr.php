<?php

// PHP strchr() Function
// Finds the first occurrence of a string inside another string (alias of strstr())
// The strchr() function searches for the first occurrence of a string inside another string.

// This function is an alias of the strstr() function.

// Note: This function is binary-safe.

// Note: This function is case-sensitive. For a case-insensitive search, use stristr() function.

// Syntax
// strchr(string,search,before_search);

echo strchr("Hello world!", "world"); // world!
echo "<br>";

echo strchr("Hello world!", 'world', true); // Hello
echo "<br>";

echo strchr("Hello world!", 'o', true); // Hell
echo "<br>";

echo strchr("Hello world!", 'o'); // o world
echo "<br>";
