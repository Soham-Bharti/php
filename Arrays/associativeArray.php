<?php

// PHP Associative Arrays
// Associative arrays are arrays that use named keys that you assign to them.

$car = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
var_dump($car); // array(3) { ["brand"]=> string(4) "Ford" ["model"]=> string(7) "Mustang" ["year"]=> int(1964) }

echo "<br>";

// Access Associative Arrays
// To access an array item you can refer to the key name.
$car = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
echo $car["model"] . "<br>"; // Mustang
echo $car["year"] . "<br>"; // 1964


// Change Value
// To change the value of an array item, use the key name:
$car = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
$car["year"] = 2024;
var_dump($car); // array(3) { ["brand"]=> string(4) "Ford" ["model"]=> string(7) "Mustang" ["year"]=> int(2024) }

echo "<br>";


// Loop Through an Associative Array
// To loop through and print all the values of an associative array, you could use a foreach loop, like this:

$car = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);

foreach ($car as $x => $y) {
    echo "$x: $y <br>";
}

// brand: Ford
// model: Mustang
// year: 1964
