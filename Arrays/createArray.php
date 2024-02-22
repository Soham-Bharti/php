<?php

// PHP Create Arrays

$name = ["soham", "bharti", "anant bhaiya", "Pushpa Raj"];
$places = array('bihar', 'mp', 'gujrat');

// Multiple Lines
$cars = [
    "Volvo",
    "BMW",
    "Toyota"
];

// Trailing Comma
// A comma after the last item is allowed:
$cars = [
    "Volvo",
    "BMW",
    "Toyota",
];


// Array Keys
// When creating indexed arrays the keys are given automatically, starting at 0 and increased by 1 for each item, so the array above could also be created with keys:

$cars = [
    0 => "Volvo",
    1 => "BMW",
    2 => "Toyota"
];
// array(3) {
//   [0]=>
//   string(5) "Volvo"
//   [1]=>
//   string(3) "BMW"
//   [2]=>
//   string(6) "Toyota"
// }




// As you can see, indexed arrays are the same as associative arrays, but associative arrays have names instead of numbers:
$myCar = [
    "brand" => "Ford",
    "model" => "Mustang",
    "year" => 1964
];
// array(3) {
//   ["brand"]=>
//   string(4) "Ford"
//   ["model"]=>
//   string(7) "Mustang"
//   ["year"]=>
//   int(1964)
// }



// Declare Empty Array
// You can declare an empty array first, and add items to it later:
$cars = [];
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";
var_dump($cars);
// array(3) {
//   [0]=>
//   string(5) "Volvo"
//   [1]=>
//   string(3) "BMW"
//   [2]=>
//   string(6) "Toyota"
// }



// The same goes for associative arrays, you can declare the array first, and then add items to it:
$myCar = [];
$myCar["brand"] = "Ford";
$myCar["model"] = "Mustang";
$myCar["year"] = 1964;

array_push($myCar, "soham");
var_dump($myCar); // array(4) { ["brand"]=> string(4) "Ford" ["model"]=> string(7) "Mustang" ["year"]=> int(1964) [0]=> string(5) "soham" }

// array(3) {
//   ["brand"]=>
//   string(4) "Ford"
//   ["model"]=>
//   string(7) "Mustang"
//   ["year"]=>
//   int(1964)
// }

echo "<br>";

// Mixing Array Keys
// You can have arrays with both indexed and named keys:

$myArr = [];
$myArr[0] = "apples";
$myArr[1] = "bananas";
$myArr["fruit"] = "cherries";
$myArr[2] = "strawberry";

var_dump($myArr); // array(3) { [0]=> string(6) "apples" [1]=> string(7) "bananas" ["fruit"]=> string(8) "cherries" }
