<?php

// PHP Callback Functions
// A callback function (often referred to as just "callback") is a function which is passed as an argument into another function.

// Any existing function can be used as a callback function. To use a function as a callback function, pass a string containing the name of the function as the argument of another function:


function stringLengthCalculator($str)
{
    return strlen($str);
}


$array = array('soham', '12osiqaf', 'mwe-=-=-=');
var_dump(array_map('stringLengthCalculator', $array)); // array(3) { [0]=> int(5) [1]=> int(8) [2]=> int(9) }

echo "<br>";

$lengths = array_map("stringLengthCalculator", $array);
print_r($lengths); // Array ( [0] => 5 [1] => 8 [2] => 9 )

echo "<br>";

//  PHP can pass anonymous functions as callback functions:
$strings = ["apple", "orange", "banana", "coconut"];
$lengths = array_map(function ($item) {
    return strlen($item);
}, $strings);
print_r($lengths); // Array ( [0] => 5 [1] => 6 [2] => 6 [3] => 7 )

echo "<br>";



// Callbacks in User Defined Functions

// call back function
function ucFunction($str)
{
    return ucwords($str);
}

function exclamationFunction($str)
{
    return $str . "!!!";
}

// user defined function
function formatedString($str, $callBack)
{
    echo $callBack($str);
}
formatedString("soham is good.", 'ucFunction');
// Soham Is Good.

echo "<br>";

formatedString("soham is good.", 'exclamationFunction'); // soham is good.!!!
