<?php

// PHP Indexed Arrays
// In indexed arrays each item has an index number.

// By default, the first item has index 0, the second item has item 1, etc.

$cars = array("Volvo", "BMW", "Toyota");
var_dump($cars); // array(3) { [0]=> string(5) "Volvo" [1]=> string(3) "BMW" [2]=> string(6) "Toyota" }

echo "<br>";

// Access Indexed Arrays
$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0]; // Volvo

echo "<br>";

// Change Value
$cars = array("Volvo", "BMW", "Toyota");
$cars[1] = "Ford";
var_dump($cars); // array(3) { [0]=> string(5) "Volvo" [1]=> string(4) "Ford" [2]=> string(6) "Toyota" }

echo "<br>";

// Loop Through an Indexed Array
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as $x) {
    echo "$x <br>";
}
// Volvo
// BMW
// Toyota

echo "<br>";


// And if you use the array_push() function to add a new item, the new item will get the index 3:
array_push($cars, "Ford");
var_dump($cars); // array(4) { [0]=> string(5) "Volvo" [1]=> string(3) "BMW" [2]=> string(6) "Toyota" [3]=> string(4) "Ford" }


echo "<br>";


$cars[5] = "Volvo";
$cars[7] = "BMW";
$cars[14] = "Toyota";
print_r($cars); // Array ( [0] => Volvo [1] => BMW [2] => Toyota [3] => Ford [5] => Volvo [7] => BMW [14] => Toyota )

echo "<br>";


// ************ HAVE A LOOK....... ******


// ***** The next array item gets the index 15:  ****
array_push($cars, "ALTO");
print_r($cars); // Array ( [0] => Volvo [1] => BMW [2] => Toyota [3] => Ford [5] => Volvo [7] => BMW [14] => Toyota [15] => ALTO )
