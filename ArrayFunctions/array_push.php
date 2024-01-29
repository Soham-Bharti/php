<?php

// array_push()
// The array_push() function inserts one or more elements to the end of an array.

// Tip: You can add one value, or as many as you like.

// Note: Even if your array has string keys, your added elements will always have numeric keys (See example below).



// Syntax
// array_push(array, value1, value2, ...)

$arr = array(2, 3, 4, 5);
array_push($arr, 6, 7, 8);
print_r($arr); // Array ( [0] => 2 [1] => 3 [2] => 4 [3] => 5 [4] => 6 [5] => 7 [6] => 8 )

echo "<br>";

$brr = array(2, 3, 4, 5);;
array_push($brr, "soham");
print_r($brr); // Array ( [0] => 2 [1] => 3 [2] => 4 [3] => 5 [4] => soham )

echo "<br>";

$a = array("a" => "red", "b" => "green");
array_push($a, "blue", "yellow");
print_r($a); // v
