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


// Trying to combine Associative Array
$userId = [1, 2, 3, 4];
$userDetails = array(
    "first" => "soham",
    "second" => "pushpa",
    "third" => "trisha",
    "fourth" => "monu",

);
$newArray = array_combine($userId, $userDetails);
print_r($newArray); // Array ( [1] => soham [2] => pushpa [3] => trisha [4] => monu )


$userId = [1, 1, 3, 4];
$userDetails = array(
    "first" => "soham",
    "second" => "pushpa",
    "third" => "trisha",
    "fourth" => "monu",

);

echo "<br>";

$newArray = array_combine($userId, $userDetails);
print_r($newArray); // Array ( [1] => pushpa [3] => trisha [4] => monu )


echo "<br> Trying array_combine() with associative array as first argument... <br>";

$sweets = array('rasmalai' => '35k', 'rasgulla' => '50k', 'jalebi' => '30k');
$salesOfSweets = [10, 30, 20];

$newArr = array_combine($sweets, $salesOfSweets);
print_r($newArr); // Array ( [35k] => 10 [50k] => 30 [30k] => 20 )

echo "<br>";

$sweetsNames = array_keys($sweets);

// var_dump($sweetsNames);
$combinedArray = array_combine($sweetsNames, $salesOfSweets);
print_r($combinedArray); // Array ( [rasmalai] => 10 [rasgulla] => 30 [jalebi] => 20 )
