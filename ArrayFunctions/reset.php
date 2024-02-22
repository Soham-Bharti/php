<?php

// reset()
// The reset() function moves the internal pointer to the first element of the array.

// Related methods:

// current() - returns the value of the current element in an array
// end() - moves the internal pointer to, and outputs, the last element in the array
// next() - moves the internal pointer to, and outputs, the next element in the array
// prev() - moves the internal pointer to, and outputs, the previous element in the array
// each() - returns the current element key and value, and moves the internal pointer forward


// Syntax
// reset(array)

$people = array("Peter", "Joe", "Glenn", "Cleveland");

echo current($people) . "<br>"; // Peter
echo next($people) . "<br>"; // Joe
echo next($people) . "<br>"; // Glenn
echo next($people) . "<br>"; // Cleveland

echo reset($people) . "<br>"; // Peter



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
