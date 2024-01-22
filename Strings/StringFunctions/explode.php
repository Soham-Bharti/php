<?php

// PHP explode() Function
// Breaks a string into an array

// Syntax
// explode(separator,string,limit)

$str = "Hello, world!";
// echo explode($str, " "); // Warning: Array to string conversion 
print_r(explode(' ', $str)); // Array ( [0] => Hello, [1] => world! )
print "<br>";
print_r(explode(' ', $str, 0)); // Array ( [0] => Hello, world! ) 
print "<br>";
print_r(explode(' ', $str, 1)); // Array ( [0] => Hello, world! ) 
print "<br>";
print_r(explode(' ', $str, 2)); // Array ( [0] => Hello, [1] => world! )
print "<br>";
print_r(explode(' ', $str, -1)); // Array ( [0] => Hello, )
print "<br>";
print_r(explode(' ', $str, -2)); // Array ( )
print "<br>";

// Note: The "separator" parameter cannot be an empty string.
// print_r(explode('', $str)); // Fatal error: Uncaught ValueError: explode(): Argument #1 ($separator) cannot be empty


$str = 'one,two,three,four';

// zero limit
print_r(explode(',',$str,0));
print "<br>";

// positive limit
print_r(explode(',',$str,2));
print "<br>";

// negative limit 
print_r(explode(',',$str,-1));