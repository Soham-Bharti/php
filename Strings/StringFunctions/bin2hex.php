<?php

// PHP bin2hex() Function
// The bin2hex() function converts a string of ASCII characters to hexadecimal values. The string can be converted back using the pack() function.

$str = "Soham Bharti";
echo bin2hex($str) . "<br>";  // 536f68616d20426861727469

$str = "Hello, world!";
echo bin2hex($str) . "<br>"; // 48656c6c6f2c20776f726c6421

$str = "Hello, Soham! How are you?";
$hexedStr =  bin2hex($str); 
echo $hexedStr . "<br>";  // 48656c6c6f2c20536f68616d2120486f772061726520796f753f

// Getting back from hex to decimal
$originalStr = pack("H*", $hexedStr);
echo $originalStr . "<br>"; // 48656c6c6f2c20536f68616d2120486f772061726520796f753f
