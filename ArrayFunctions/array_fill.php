<?php

// array_fill()
// The array_fill() function fills an array with values.

// Syntax
// array_fill(index, number, value)

// Parameter	Description
// index	Required. The first index of the returned array
// number	Required. Specifies the number of elements to insert
// value	Required. Specifies the value to use for filling the array

$a1 = array_fill(3, 4, "blue");
print_r($a1); // Array ( [3] => blue [4] => blue [5] => blue [6] => blue )

echo "<br>";

// $a1 = array_fill(3, 4, "blue"=> 'BIG B FAV color'); // errror


$brr = array_fill(1, 3, 'soham');
print_r($brr); // Array ( [1] => soham [2] => soham [3] => soham )
