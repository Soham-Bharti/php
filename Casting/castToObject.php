<?php

// Cast to Object

$int = 89;
$float = 9.89;
$str = "Hello";
$bool = true;
$null = NULL;
$nan = NAN;

var_dump((object)$int); // object(stdClass)#1 (1) { ["scalar"]=> int(89) }
echo "<br>";
var_dump((object)$float); // object(stdClass)#1 (1) { ["scalar"]=> float(9.89) }
echo "<br>";
var_dump((object)$str); // object(stdClass)#1 (1) { ["scalar"]=> string(5) "Hello" }
echo "<br>";
var_dump((object)$bool); // object(stdClass)#1 (1) { ["scalar"]=> bool(true) }
echo "<br>";
var_dump((object)$null); // object(stdClass)#1 (0) { }
echo "<br>";
var_dump((object)$nan); // object(stdClass)#1 (1) { ["scalar"]=> float(NAN) }
echo "<br>";

// When converting into objects, most data types converts into a object with one property, named "scalar", with the corresponding value.

// NULL values converts to an empty object.

// Indexed arrays converts into objects with the index number as property name and the value as property value.

// Associative arrays converts into objects with the keys as property names and values as property values.


// Converting Arrays into Objects:

$a = array("Volvo", "BMW", "Toyota"); // indexed array
$b = array("Peter" => "35", "Ben" => "37", "Joe" => "43"); // associative array

$a = (object) $a;
$b = (object) $b;

var_dump($a); // object(stdClass)#1 (3) { ["0"]=> string(5) "Volvo" ["1"]=> string(3) "BMW" ["2"]=> string(6) "Toyota" }
echo "<br>";
var_dump($b); // object(stdClass)#2 (3) { ["Peter"]=> string(2) "35" ["Ben"]=> string(2) "37" ["Joe"]=> string(2) "43" }
