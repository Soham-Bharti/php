<?php


// range()
// The range() function creates an array containing a range of elements.

// This function returns an array of elements from low to high.

// Note: If the low parameter is higher than the high parameter, the range array will be from high to low.


// Syntax
// range(low, high, step)


$number = range(0, 5);
print_r($number); // Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 )
echo "<br>";

// Note: If the low parameter is higher than the high parameter, the range array will be from high to low.
$number = range(5, 0);
print_r($number); // Array ( [0] => 5 [1] => 4 [2] => 3 [3] => 2 [4] => 1 [5] => 0 )
echo "<br>";



// step	Optional. Specifies the increment used in the range. Default is 1
$number = range(0, 50, 10);
print_r($number); // Array ( [0] => 0 [1] => 10 [2] => 20 [3] => 30 [4] => 40 [5] => 50 )
echo "<br>";


$letter = range(true, false);
print_r($letter); // Array ( [0] => 1 [1] => 0 )
echo "<br>";

// $letter = range(true, NULL); // No error ust a warning by extension
// print_r($letter); // Array ( [0] => 1 [1] => 0 )
// echo "<br>";

// $letter = range(false, NULL); // // No error ust a warning by extension
// print_r($letter); // Array ( [0] => 0 )
// echo "<br>";

$letter = range("a", "d");
print_r($letter); // Array ( [0] => a [1] => b [2] => c [3] => d )
echo "<br>";

$letter = range("s", "c");
print_r($letter); // Array ( [0] => s [1] => r [2] => q [3] => p [4] => o [5] => n [6] => m [7] => l [8] => k [9] => j [10] => i [11] => h [12] => g [13] => f [14] => e [15] => d [16] => c )
echo "<br>";

$letter = range("s", "c", 5);
print_r($letter); // Array ( [0] => s [1] => n [2] => i [3] => d )
echo "<br>";

$letter = range("s", "p");
print_r($letter); // Array ( [0] => s [1] => r [2] => q [3] => p )
echo "<br>";

$letter = range("s", "p", 2);
print_r($letter); // Array ( [0] => s [1] => q )
echo "<br>";
