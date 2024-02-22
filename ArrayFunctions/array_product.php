<?php

// array_product()
// The array_product() function calculates and returns the product of an array.

// Syntax
// array_product(array)

$a = array(5, 5);
var_dump(array_product($a)); // int(25)

echo "<br>";

$a = array(5, 9.5);
var_dump(array_product($a)); // float(47.5)

echo "<br>";

$a = array("5", 9.5);
var_dump(array_product($a)); // float(47.5)

echo "<br>";

$a = array("05", 9.5);
var_dump(array_product($a)); // float(47.5)

echo "<br>";

$a = array("5 soham", 9.5);
var_dump(array_product($a)); // float(47.5)

echo "<br>";

$a = array("soham 5", 9.5);
var_dump(array_product($a)); // float(0)

echo "<br>";

$a = array(" soham 5", 9.5);
var_dump(array_product($a)); // float(0)

echo "<br>";

$a = array(true . "soham 5", 9.5);
var_dump(array_product($a)); // float(9.5)

echo "<br>";

$a = array("soham 5" . true, 9.5);
var_dump(array_product($a)); // float(0)