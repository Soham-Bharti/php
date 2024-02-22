<?php

// Regular Expression Patterns
// Brackets are used to find a range of characters:
// [abc]	Find one or many of the characters inside the brackets	
// [^abc]	Find any character NOT between the brackets	
// [a-z]	Find any character alphabetically between two letters	
// [A-z]	Find any character alphabetically between a specified upper-case letter and a specified lower-case letter	
// [A-Z]	Find any character alphabetically between two upper-case letters.	
// [123]	Find one or many of the digits inside the brackets	
// [0-5]	Find any digits between the two numbers	
// [0-9]	Find any digits


// How many occurences of the letters "c" or "o" are in the text "W3Schools.com"
$txt = "W3Schools.com";
$pattern = "/[co]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 5
echo preg_replace($pattern, "#", $txt) . "<br>"; // W3S#h##ls.##m


// How many letters in the text "Welcome" are not "e" or "o"
$txt = "Welcome";
$pattern = "/[^eo]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 4
echo preg_replace($pattern, "#", $txt) . "<br>"; // #e##o#e


// How many letters in the text "Welcome" are alphabetically between "e" and "o"
$txt = "Welcome";
$pattern = "/[e-o]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 5
echo preg_replace($pattern, '#', $txt) . "<br>"; // W##c###


// How many letters in the text "Welcome to W3Schools" are alphabetically between uppercase "T" and lowercase "e"
$txt = "Welcome to W3Schools";
$pattern = "/[T-e]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 6
echo preg_replace($pattern, "#", $txt) . "<br>"; // ##l#om# to #3S#hools


// How many letters in the text "Welcome to W3Schools" are alphabetically between uppercase "A" and uppercase "Z"
$txt = "Welcome to W3Schools";
$pattern = "/[A-Z]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 3
echo preg_replace($pattern, "#", $txt) . "<br>"; // #elcome to #3#chools


// How many characters in the text "W3Schools has been live since 1999" is either the number "1", "2", or "3"
$txt = "W3Schools has been live since 1999";
$pattern = "/[123]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 2
echo preg_replace($pattern, "#", $txt) . "<br>"; // W#Schools has been live since #999


// How many characters in the text "Call 555-2368" is a digit between "0" and "5"
$txt = "Call 555-2368";
$pattern = "/[0-5]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 5
echo preg_replace($pattern, "#", $txt) . "<br>"; // Call ###-##68


// Find all digits in the text "W3Schools has been live since 1999"
$txt = "W3Schools has been live since 1999";
$pattern = "/[0-9]/";
echo preg_match_all($pattern, $txt) . "<br>"; // 5
echo preg_replace($pattern, "#", $txt); // W#Schools has been live since ####
