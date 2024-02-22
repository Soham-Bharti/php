<?php


// array_pad()
// The array_pad() function inserts a specified number of elements, with a specified value, to an array.

// Tip: If you assign a negative size parameter, the function will insert new elements BEFORE the original elements (See example below).

// Note: This function will not delete any elements if the size parameter is less than the size of the original array.


// Syntax
// array_pad(array, size, value)

$arr = array('red', 'blue');
print_r(array_pad($arr, 8, 'green')); // Array ( [0] => red [1] => blue [2] => green [3] => green [4] => green [5] => green [6] => green [7] => green )

echo "<br>";

$a = array("red", "green");
print_r(array_pad($a, -5, "blue")); // Array ( [0] => blue [1] => blue [2] => blue [3] => red [4] => green )
