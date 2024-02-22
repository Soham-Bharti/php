<?php

// Cast to Integer

$int = 9;
$float = 19.89;
$bool = true;
$str = "Soham";
$null = NULL;
$nan = NAN;
$str1 = "27 ram";
$str2 = " ram 27";
$str3 = "ram 27";


var_dump((int)$int); // int(9)
echo "<br>";
var_dump((int)$float); // int(19)
echo "<br>";
var_dump((int)$bool); // int (1)
echo "<br>";
var_dump((int)$str); // int (0)
echo "<br>";
var_dump((int)$null); // int (0)
echo "<br>";
var_dump((int)$nan); // int (0)
echo "<br>";
var_dump((int)$str1); // int (27)
echo "<br>";
var_dump((int)$str2); // int (0)
echo "<br>";
var_dump((int)$str3); // int (0)
echo "<br>";
