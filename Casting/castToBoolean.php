<?php

// Cast to Boolean

$int  = 9;
$int1 = 0;
$int2 = -1;
$float  = 8.99;
$float1 = 0.9;
$float2 = -0.9;
$bool = true;
$str = "hello";
$str1 = "";
$null = NULL;
$nan = NAN;


// If a value is 0, NULL, false, or empty, the (bool) converts it into false, otherwise true.

// Even -1 converts to true.

var_dump((bool)$int); // bool(true)
echo "<br>";
var_dump((bool)$int1); // bool(false)
echo "<br>";
var_dump((bool)$int2); // bool(true)
echo "<br>";
var_dump((bool)$float); // bool(true)
echo "<br>";
var_dump((bool)$float1); // bool(true)
echo "<br>";
var_dump((bool)$float2); // bool(true)
echo "<br>";
var_dump((bool)$bool); // bool(true)
echo "<br>";
var_dump((bool)$str); // bool(true)
echo "<br>";
var_dump((bool)$str1); // bool(false)
echo "<br>";
var_dump((bool)$null); // bool(false)
echo "<br>";
var_dump((bool)$nan); // bool(true)
echo "<br>";
