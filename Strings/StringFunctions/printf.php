<?php

// PHP printf() Function
// Outputs a formatted string

// Syntax
// printf(format,arg1,arg2,arg++)

$name = "Soham";
$age = 27;

printf("Hello %s, you are %d years old <br>", $name, $age);


// Format	Required. Specifies the string and how to format the variables in it.
// Possible format values:

// %% - Returns a percent sign
// %b - Binary number
// %c - The character according to the ASCII value
// %d - Signed decimal number (negative, zero or positive)
// %e - Scientific notation using a lowercase (e.g. 1.2e+2)
// %E - Scientific notation using a uppercase (e.g. 1.2E+2)
// %u - Unsigned decimal number (equal to or greather than zero)
// %f - Floating-point number (local settings aware)
// %F - Floating-point number (not local settings aware)
// %g - shorter of %e and %f
// %G - shorter of %E and %f
// %o - Octal number
// %s - String
// %x - Hexadecimal number (lowercase letters)
// %X - Hexadecimal number (uppercase letters)

$salary = 19990;
printf("Salary is %1\$.2f", $salary);

$num1 = 123456789;
$num2 = -123456789;
$char = 50; // The ASCII Character 50 is 2

// Note: The format value "%%" returns a percent sign
printf("%%b = %b <br>",$num1); // Binary number -> %b = 111010110111100110100010101
printf("%%c = %c <br>",$char); // The ASCII Character -> %c = 2
printf("%%d = %d <br>",$num1); // Signed decimal number -> %d = 123456789
printf("%%d = %d <br>",$num2); // Signed decimal number -> %d = -123456789
printf("%%e = %e <br>",$num1); // Scientific notation (lowercase) -> %e = 1.234568e+8
printf("%%E = %E <br>",$num1); // Scientific notation (uppercase) -> %E = 1.234568E+8
printf("%%u = %u <br>",$num1); // Unsigned decimal number (positive) -> %u = 123456789
printf("%%u = %u <br>",$num2); // Unsigned decimal number (negative) -> %u = 18446744073586094827
printf("%%f = %f <br>",$num1); // Floating-point number (local settings aware) -> %f = 123456789.000000
printf("%%F = %F <br>",$num1); // Floating-point number (not local sett aware) -> %F = 123456789.000000
printf("%%g = %g <br>",$num1); // Shorter of %e and %f -> %g = 1.23457e+8
printf("%%G = %G <br>",$num1); // Shorter of %E and %f -> %G = 1.23457E+8
printf("%%o = %o <br>",$num1); // Octal number -> %o = 726746425
printf("%%s = %s <br>",$num1); // String -> %s = 123456789
printf("%%x = %x <br>",$num1); // Hexadecimal number (lowercase) -> %x = 75bcd15
printf("%%X = %X <br>",$num1); // Hexadecimal number (uppercase) -> %X = 75BCD15
printf("%%+d = %+d <br>",$num1); // Sign specifier (positive) -> %+d = +123456789
printf("%%+d = %+d <br>",$num2); // Sign specifier (negative) -> %+d = -123456789
