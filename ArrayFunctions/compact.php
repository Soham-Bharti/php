<?php

// compact()
// The compact() function creates an array from variables and their values.

// Note: Any strings that does not match variable names will be skipped.


// Syntax
// compact(var1, var2...)

$firstname = "Soham";
$lastname = "Bharti";
$age = 21;

$result = compact("firstname", "lastname", "age");

print_r($result); // Array ( [firstname] => Soham [lastname] => Bharti [age] => 21 )
echo "<br>";


$firstname = "Soham";
$lastname = "Bharti";
$age = 21;
$marriedStatus = NULL;
$salary = NAN;
$intern = true;

$result = compact("firstname", "lastname", "age", "marriedStatus", "salary", "intern");

print_r($result); // Array ( [firstname] => Soham [lastname] => Bharti [age] => 21 [marriedStatus] => [salary] => NAN [intern] => 1 )