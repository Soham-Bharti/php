<?php

// count()
// The count() function returns the number of elements in an array.


// Syntax
// count(array, mode)

// Parameter	Description
// array	Required. Specifies the array
// mode	Optional. Specifies the mode. Possible values:
// 0 - Default. Does not count all elements of multidimensional arrays
// 1 - Counts the array recursively (counts all the elements of multidimensional arrays)

$cars = array("Volvo", "BMW", "Toyota");
echo count($cars) . "<br>"; // 3

$names = array("Soham", "Harsh", "Shubh", array("Volvo", "BMW", "Toyota"), ['Soham', 'Harsh', 'Shiva']);
echo count($names) . "<br>"; // 5
echo count($names, 1) . "<br>"; // 11 = 5 + 6

$names = array("Soham", "Harsh", "Trainee"  => array("Volvo", "BMW", "Toyota"));
echo count($names) . "<br>"; // 3
echo count($names, 1) . "<br>"; // 6
