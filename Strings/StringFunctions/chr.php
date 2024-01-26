<?php

// PHP chr() Function
// Returns a character from a specified ASCII value

echo chr(52) . "<br>"; // Decimal value -> 4
echo chr(052) . "<br>"; // Octal value -> *
echo chr(0x52) . "<br>"; // Hex value -> R

$str = chr(43);
$str2 = chr(61);
echo("2 $str 2 $str2 4") . "<br>"; // 2 + 2 = 4

echo "You ". chr(38). " me!" . "<br>"; // You & me!
echo "You ". chr(046). " me!" . "<br>"; // You & me!