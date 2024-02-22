<?php

// CAST TO FLOAT

$int = 89;
$float = 8.90;
$bool = true;
$str = "Soham";
$str1 = "27 Soham";
$str2 = "27.90 Soham";
$str3 = "Soham 28.8";
$null = NULL;
$nan = NAN;


var_dump((float)$int); // float(89)
echo "<br>";
var_dump((float)$float); // float(8.9)
echo "<br>";
var_dump((float)$bool); // float(1)
echo "<br>";
var_dump((float)$str); // float(0)
echo "<br>";
var_dump((float)$str1); // float(27)
echo "<br>";
var_dump((float)$str2); // float(27.9)
echo "<br>";
var_dump((float)$str3); // float(0)
echo "<br>";
var_dump((float)$null); // float(0)
echo "<br>";
var_dump((float)$nan); // float(NAN)
echo "<br>";
