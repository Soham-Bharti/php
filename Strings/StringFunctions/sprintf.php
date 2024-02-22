<?php

// PHP sprintf() Function
// 	Writes a formatted string to a variable

// Syntax
// sprintf(format,arg1,arg2,arg++)

$number = 10;
$name = "Sumit";
echo sprintf("His name is %s and his number is %u", $name, $number);
echo "<br>";

$number = 123;
$txt = sprintf("%f",$number);
echo $txt;
echo "<br>";

$txt = sprintf("%1\$.2f",$number);
echo $txt;
echo "<br>";
echo sprintf("%1\$u",$number);
