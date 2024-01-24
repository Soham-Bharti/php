<?php

// Cast to Array

$int = 7;
$float = 9.9;
$str = "Hello";
$str1 = "Hello soham";
$bool = true;
$null = NULL;
$nan = NAN;

var_dump((array)$int); // array(1) { [0]=> int(7) }
echo "<br>";
var_dump((array)$float); // array(1) { [0]=> float(9.9) }
echo "<br>";
var_dump((array)$str); // array(1) { [0]=> string(5) "Hello" }
echo "<br>";
var_dump((array)$str1); // array(1) { [0]=> string(11) "Hello soham" }
echo "<br>";
var_dump((array)$bool); // array(1) { [0]=> bool(true) }
echo "<br>";
var_dump((array)$null); // array(0) { }
echo "<br>";
var_dump((array)$nan); // array(1) { [0]=> float(NAN) }
echo "<br>";
