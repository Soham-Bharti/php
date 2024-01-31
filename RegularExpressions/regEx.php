<?php

// PHP Regular Expressions
// A regular expression is a sequence of characters that forms a search pattern. When you search for data in a text, you can use this search pattern to describe what you are searching for.

// A regular expression can be a single character, or a more complicated pattern.

// Regular expressions can be used to perform all types of text search and text replace operations.


// Syntax
// In PHP, regular expressions are strings composed of delimiters, a pattern and optional modifiers.

// $exp = "/w3schools/i";
// In the example above, / is the delimiter, w3schools is the pattern that is being searched for, and i is a modifier that makes the search case-insensitive.

// The delimiter can be any character that is not a letter, number, backslash or space. The most common delimiter is the forward slash (/), but when your pattern contains forward slashes it is convenient to choose other delimiters such as # or ~.



/*
Regular Expression Functions
PHP provides a variety of functions that allow you to use regular expressions.

The most common functions are:

Function	        Description
preg_match()	    Returns 1 if the pattern was found in the string and 0 if not
preg_match_all()	Returns the number of times the pattern was found in the string, which may also be 0
preg_replace()	    Returns a new string where matched patterns have been replaced with another string
*/

$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str); // 1

echo "<br>";

$str = "Visit W3Schools";
$pattern = "/w3scHOOls/i";
echo preg_match($pattern, $str); // 1
echo "<br>";

$str = "Visit W3Schools";
$pattern = "/w3scHOOls/";
echo preg_match($pattern, $str); // 0
