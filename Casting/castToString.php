<?php

// Cast to string

$intNum = 9;
$floatNum = 9.80;
$bool = false;
$str = "Soham";
$null = NULL;
$nan = NAN;

var_dump((string)$intNum); // string(1) "9"
echo "<br>";
var_dump((string)$floatNum); // string(3) "9.8"
echo "<br>";
var_dump((string)$bool); // string(0) ""
echo "<br>";
var_dump((string)$str); // string(5) "Soham"
echo "<br>";
var_dump((string)$null); // string(0) ""
echo "<br>";
var_dump((string)$nan); // string(3) "NAN"
echo "<br>";
