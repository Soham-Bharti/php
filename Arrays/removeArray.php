<?php


// PHP Delete Array Items
// To remove an existing item from an array, you can use the unset() function.

// The unset() function deletes specified variables, and can therefor be used to delete array items:

$names = array('soham', 'aman', 'monu', 'sonu');
var_dump($names);

echo "<br>";

// Note: The unset() function will NOT re-arrange the indexes, and the examples above will no longer contain the missing indexes.

unset($names[1]);
var_dump($names); // array(3) { [0]=> string(5) "soham" [2]=> string(4) "monu" [3]=> string(4) "sonu" }

echo "<br>";

unset($names[0], $names[2]);
var_dump($names); // array(1) { [3]=> string(4) "sonu" }


echo "<br>";
unset($names);
// var_dump($names); // Warning: Undefined variable $names




// Using the array_splice Function
// If you want the array to re-arrange the indexes, you can use the array_splice() function.

// With the array_splice() function you specify the index (where to start) and how many items you want to delete.
echo "<br>";

$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 1);
var_dump($cars); // array(2) { [0]=> string(5) "Volvo" [1]=> string(6) "Toyota" }

echo "<br>";

$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 0);
var_dump($cars); // array(0) { }


// Remove Item From an Associative Array
// To remove items from an associative array, you can use unset() function like before, but referring to the key name instead of index.
echo "<br>";

$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
unset($cars["model"]);
var_dump($cars); // array(2) { ["brand"]=> string(4) "Ford" ["year"]=> int(1964) }

echo "<br>";

$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
array_splice($cars, 1);
var_dump($cars); // array(1) { ["brand"]=> string(4) "Ford" }
