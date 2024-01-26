<?php

// PHP Access Arrays
// To access an array item, you can refer to the index number for indexed arrays, and the key name for associative arrays.

$cars = array("Volvo", "BMW", "Toyota");
echo $cars[2] . "<br>"; // Toyota


// To access items from an associative array, use the key name:
$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
echo $cars["year"] . "<br>"; // 1964

// Double or Single Quotes
// You can use both double and single quotes when accessing an array:

echo $cars["model"] . "<br>"; // Mustang
echo $cars['model'] . "<br>"; // Mustang

// Excecute a Function Item
// function myFunction()
// {
//     echo "I come from a function!";
// }
// $myArr = array("Volvo", 15, myFunction()); // getting called
// var_dump($myArr[2]); // NULL
// $myArr[2](); // Fatal error: Uncaught Error: Value of type null is not callable

function myFunction()
{
    return "I come from a function!";
}

// *********** DOUBT ****************

$myArr = array('volvo', 27, myFunction());
echo "Fetching myArr[2] " . $myArr[2]; // Fetching myArr[2] I come from a function!


echo "<br>";

// Use the key name when the function is an item in a associative array
$myArr = array("car" => "Volvo", "age" => 15, "message" => myFunction());

// $myArr["message"]();


// *********** DOUBT ****************



echo "<br>";

// Loop Through an Associative Array
// To loop through and print all the values of an associative array, you can use a foreach loop, like this:
$car = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);

foreach ($car as $x => $y) {
    echo "$x: $y <br>";
}
// brand: Ford
// model: Mustang
// year: 1964
