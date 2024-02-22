<?php

// PHP Integers
// An integer is a number without any decimal part.

$number1 = 10;
echo "$number1<br>";

// Predefined constants for integer 
/*
1. PHP_INT_MAX
2. PHP_INT_MIN
3. PHP_INT_SIZE
*/

echo PHP_INT_MAX . "<br>"; // 9223372036854775807
echo PHP_INT_MIN . "<br>"; // -9223372036854775808
echo PHP_INT_SIZE . "<br>"; // 8

//  9223372036854775807 -> A value greater (or lower) than this, will be stored as float, because it exceeds the limit of an integer.

$num =  9223372036854775807;
var_dump($num) . "<br>"; // int(9223372036854775807)

var_dump($num + 1) . "<br>"; // float(9.223372036854776E+18)


// PHP has the following functions to check if the type of a variable is integer:

//     is_int()
//     is_integer() - alias of is_int()
//     is_long() - alias of is_int()

var_dump(is_int($num)); // bool(true)
var_dump(is_long($num)); // bool(true)
var_dump(is_int($num + 1)); // bool(false)
