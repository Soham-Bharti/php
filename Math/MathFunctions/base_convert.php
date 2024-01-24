<?php

// PHP base_convert() Function
// The base_convert() function converts a number from one number base to another.

// Syntax
// base_convert(number,frombase,tobase);

// number	--> Required. Specifies the number to convert
// frombase	--> Required. Specifies the original base of number. Has to be between 2 and 36, inclusive. Digits in numbers with a base higher than 10 will be represented with the letters a-z, with a meaning 10, b meaning 11 and z meaning 35
// tobase	--> Required. Specifies the base to convert to. Has to be between 2 and 36, inclusive. Digits in numbers with a base higher than 10 will be represented with the letters a-z, with a meaning 10, b meaning 11 and z meaning 35


echo base_convert("0031", 8, 10) . "<br>"; // 25 (octal number to decimal number)
echo base_convert("E196", 16, 10) . "<br>"; // 57750 (hexadecimal number to decimal number)
echo base_convert("E196", 16, 8) . "<br>"; // 160626 (hexadecimal number to octal number)
echo base_convert("E196", 8, 16) . "<br>"; // e (octal number to hexadecimal number)
echo base_convert("364", 16, 8) . "<br>"; // 1544 (hexadecimal number to octal number)
