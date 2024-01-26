<?php

// array_combine()
// The array_combine() function creates an array by using the elements from one "keys" array and one "values" array.

// Note: Both arrays must have equal number of elements!

// Syntax
// array_combine(keys, values)

$fname = array("Peter", "Ben", "Joe");
$age = array("35", "37", "43");

$c = array_combine($fname, $age);
print_r($c); // Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 )

echo "<br>";

$d = array_combine($age, $fname);
print_r($d); // Array ( [35] => Peter [37] => Ben [43] => Joe )

echo "<br>";

// Note: Both arrays must have equal number of elements!
$fname = array("Peter", "Ben", "Joe");
$age = array("35", "37");


// $c = array_combine($fname, $age); // Fatal error: Uncaught ValueError: array_combine(): Argument #1 ($keys) and argument #2 ($values) must have the same number of elements 