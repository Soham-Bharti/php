<?php


// PHP Update Array Items
// To update an existing array item, you can refer to the index number for indexed arrays, and the key name for associative arrays.
$cars = array("Volvo", "BMW", "Toyota");
$cars[1] = "Ford";
var_dump($cars); // array(3) { [0]=> string(5) "Volvo" [1]=> string(4) "Ford" [2]=> string(6) "Toyota" }

echo "<br>";

// To update items from an associative array, use the key name:
$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
$cars["year"] = 2024;
var_dump($cars); // array(3) { ["brand"]=> string(4) "Ford" ["model"]=> string(7) "Mustang" ["year"]=> int(2024) }



// Update Array Items in a Foreach Loop
// There are different techniques to use when changing item values in a foreach loop.

// One way is to insert the & character in the assignment to assign the item value by reference, and thereby making sure that any changes done with the array item inside the loop will be done to the original array:

echo "<br>";

$cars = array('alto', 'bmw', 'scorpio');
foreach ($cars as &$x) {
    $x = 'ford';
}
var_dump($cars); // array(3) { [0]=> string(4) "ford" [1]=> string(4) "ford" [2]=> &string(4) "ford" }
// Note: Remember to add the unset() function after the loop.

// Without the unset($x) function, the $x variable will remain as a reference to the last array item.

// To demonstrate this, see what happens when we change the value of $x after the foreach loop:

echo "<br>";

$cars = array('alto', 'bmw', 'scorpio');
foreach ($cars as &$x) {
    $x = 'ford';
}
unset($x);
var_dump($cars); // array(3) { [0]=> string(4) "ford" [1]=> string(4) "ford" [2]=> string(4) "ford" }



