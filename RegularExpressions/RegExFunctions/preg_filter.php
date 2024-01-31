<?php

// preg_filter()
// The preg_filter() function returns a string or array of strings in which matches of the pattern have been replaced with the replacement string.

// If the input is an array, this function returns an array. If the input is a string then this function returns a string.

// This function is similar to preg_replace() with one difference: When a match for the pattern is not found in an input string, the string will not be used in the return value. In this scenario, if the input is a string instead of an array then the function returns null.

// Replacement strings may contain backreferences in the form \n or $n where n is the index of a group in the pattern. In the returned string, instances of \n and $n will be replaced with the substring that was matched by the group or, if \0 or $0 are used, by the whole expression.



// Syntax
// preg_filter(pattern, replacement, input, limit, count)

$input = [
    "It is 5 o'clock",
    "40 days",
    "No numbers here",
    "In the year 2000"
];

$result = preg_filter('/[0-9]+/', '($0)', $input, -1, $count);
print_r($result); // Array ( [0] => It is (5) o'clock [1] => (40) days [3] => In the year (2000) )
echo " count is $count<br>"; //  ...count is 3


$str = "This is my 20th string in 270th video";
print_r(preg_filter('/[0]/', '($0)', $str, -1, $count)); // This is my 2(0)th string in 27(0)th video 
echo " and count is $count <br>"; // and count is 2

print_r(preg_filter('/[0]+/', '($0)', $str, -1, $count)); // This is my 2(0)th string in 27(0)th video
echo " and count is $count <br>"; // and count is 2

var_dump(preg_filter('/[3]+/', '($0)', $str, -1, $count)); // NULL