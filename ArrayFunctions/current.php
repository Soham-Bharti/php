<?php

// current()
// The current() function returns the value of the current element in an array.

// Every array has an internal pointer to its "current" element, which is initialized to the first element inserted into the array.

// Tip: This function does not move the arrays internal pointer.

// Related methods:

// end() - moves the internal pointer to, and outputs, the last element in the array
// next() - moves the internal pointer to, and outputs, the next element in the array
// prev() - moves the internal pointer to, and outputs, the previous element in the array
// reset() - moves the internal pointer to the first element of the array
// each() - returns the current element key and value, and moves the internal pointer forward
// Syntax
// current(array)



$people = array("Peter", "Joe", "Glenn", "Cleveland");

echo current($people) . "<br>"; // Peter
// print_r(each($people)); // deprecated Note: The each() function is deprecated in PHP 7.2.
// Array ( [1] => Peter [value] => Peter [0] => 0 [key] => 0 )


$people = array("Peter", "Joe", "Glenn", "Cleveland");

echo current($people) . "<br>"; // The current element is Peter
echo next($people) . "<br>"; // The next element of Peter is Joe
echo current($people) . "<br>"; // Now the current element is Joe
echo prev($people) . "<br>"; // The previous element of Joe is Peter
echo end($people) . "<br>"; // The last element is Cleveland
echo prev($people) . "<br>"; // The previous element of Cleveland is Glenn
echo current($people) . "<br>"; // Now the current element is Glenn
echo reset($people) . "<br>"; // Moves the internal pointer to the first element of the array, which is Peter
echo next($people) . "<br>"; // The next element of Peter is Joe

// print_r(each($people)); // Returns the key and value of the current element (now Joe), and moves the internal pointer forward
