<?php

// PHP and JSON
// JSON stands for JavaScript Object Notation, and is a syntax for storing and exchanging data.

// Since the JSON format is a text-based format, it can easily be sent to and from a server, and used as a data format by any programming language.

// PHP has some built-in functions to handle JSON.

// json_encode()
// json_decode()


// PHP - json_encode()
// The json_encode() function is used to encode a value to JSON format.


$userAges = array("soham" => 22, "ladoo" => 90, "mombatti" => 87);
echo json_encode($userAges); // {"soham":22,"ladoo":90,"mombatti":87}

echo "<br>";

$cars = array("Volvo", "BMW", "Toyota");

echo json_encode($cars); // ["Volvo","BMW","Toyota"]

echo "<br>";

$encodedAges = json_encode($userAges);
$decodedAges = json_decode($encodedAges);
print_r($decodedAges); // stdClass Object ( [soham] => 22 [ladoo] => 90 [mombatti] => 87 )


echo "<br>";
$jsonObj = '{"soham":22,"ladoo":90,"mombatti":87}';
var_dump(json_decode($jsonObj)); // object(stdClass)#2 (3) { ["soham"]=> int(22) ["ladoo"]=> int(90) ["mombatti"]=> int(87) }


// The json_decode() function returns an object by default. The json_decode() function has a second parameter, and when set to true, JSON objects are decoded into associative arrays.

echo "<br>";
$jsonObj = '{"soham":22,"ladoo":90,"mombatti":87}';
var_dump(json_decode($jsonObj, true)); // array(3) { ["soham"]=> int(22) ["ladoo"]=> int(90) ["mombatti"]=> int(87) }
echo "<br>";
print_r(json_decode($jsonObj, true)); // Array ( [soham] => 22 [ladoo] => 90 [mombatti] => 87 )

echo "<br>";
$decodedObj = json_decode($jsonObj);
echo  $decodedObj->soham; // 22


// PHP - Looping Through the Values
// This example shows how to loop through the values of a PHP object:
echo "PHP - Looping Through the Values <br>";

foreach ($decodedObj as $key => $value) {
    echo "key is " . $key . " value is " . $value . "<br>";
}
// key is soham value is 22
// key is ladoo value is 90
// key is mombatti value is 87


// This example shows how to loop through the values of a PHP associative array:
$arr = json_decode($jsonObj, true);
foreach ($decodedObj as $key => $value) {
    echo "key is " . $key . " value is " . $value . "<br>";
}
// key is soham value is 22
// key is ladoo value is 90
// key is mombatti value is 87