<?php

// Regular Expression Modifiers
// Modifiers can change how a search is performed.

// i	Performs a case-insensitive search	
// m	Performs a multiline search (patterns that search for a match at the beginning or end of a string will now match the beginning or end of each line)	
// u	Enables correct matching of UTF-8 encoded patterns	


$txt = "you are better than\nyou think";
$pattern = "/^you/m";
echo preg_match_all($pattern, $txt) . "<br>"; // 2

echo preg_replace($pattern, "*", $txt) . "<br>"; // * are better than * think

$statement = "My name is SOHAM BHARTI";
$pattern = "/am/";
echo preg_match_all($pattern, $statement) . "<br>"; // 1

$statement = "My name is SOHAM BHARTI";
$pattern = "/am/i";
echo preg_match_all($pattern, $statement) . "<br>"; // 2
