<?php


// array_filter()
// The array_filter() function filters the values of an array using a callback function.

// This function passes each value of the input array to the callback function. If the callback function returns true, the current value from input is returned into the result array. Array keys are preserved.

// Syntax
// array_filter(array, callbackfunction, flag)

// callbackfunction	Optional. Specifies the callback function to use

function test_odd($var)
{
    return ($var & 1);
}

$a1 = array(1, 3, 2, 3, 4);
print_r(array_filter($a1, "test_odd")); // Array ( [0] => 1 [1] => 3 [3] => 3 )

echo "<br>";

//      flag	Optional. Specifies what arguments are sent to callback:
//     ARRAY_FILTER_USE_KEY - pass key as the only argument to callback (instead of the value)
//     ARRAY_FILTER_USE_BOTH - pass both value and key as arguments to callback (instead of the value)
function test($key): bool
{
    return $key > 5;
}

$arr = array(1 => 'soham', 7 => 'monu', 2 => 'amaresh', 9 => 'sonu');
print_r(array_filter($arr, "test", ARRAY_FILTER_USE_KEY)); // Array ( [7] => monu [9] => sonu )
echo "<br>";
print_r(array_filter($arr, "test", ARRAY_FILTER_USE_BOTH)); // Array ( [1] => soham [7] => monu [2] => amaresh [9] => sonu )


echo "<br>";


$brr = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11);
print_r(array_filter($brr, "test", ARRAY_FILTER_USE_BOTH)); // Array ( [6] => 6 [7] => 7 [8] => 8 [9] => 9 [10] => 10 [11] => 11 )


echo "<br>";

$brr = array('1' => 0x1, 2 => '2', 3 => 3, 4 => 4, 5 => '05', 06 => 6, 07 => 07, 8 => 0x8, 9 => 9, 10 => 10, 11 => 11);
print_r(array_filter($brr, "test", ARRAY_FILTER_USE_BOTH)); // Array ( [6] => 6 [7] => 7 [8] => 8 [9] => 9 [10] => 10 [11] => 11 )
