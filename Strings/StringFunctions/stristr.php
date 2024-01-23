<?php


// PHP stristr() Function
// The stristr() function searches for the first occurrence of a string inside another string.

// Syntax
// stristr(string,search,before_search)

echo stristr("Hello World", 'o'); // o World
echo "<br>";

echo stristr("Hello World", 'o', true); // Hell
echo "<br>";

echo stristr("Hello World Hello World Hello World", 'o', true); // Hell
echo "<br>";

echo stristr("Hello World Hello World Hello World", 'o'); // o World Hello World Hello World
echo "<br>";
