<?php

// PHP FLOATS
// A float is a number with a decimal point or a number in exponential form.

$floatNum = 2.90;
$floatNum2 = 2.90E+5;
$floatNum3 = 2.90E-5;

var_dump(is_float($floatNum)); // bool(true)
echo "<br>";

var_dump(is_float($floatNum2)); // bool(true)
echo "<br>";

var_dump(is_float($floatNum3)); // bool(true)
echo "<br>";

// PHP has the following predefined constants for floats (from PHP 7.2):

//     PHP_FLOAT_MAX - The largest representable floating point number
//     PHP_FLOAT_MIN - The smallest representable positive floating point number
//     PHP_FLOAT_DIG - The number of decimal digits that can be rounded into a float and back without precision loss
//     PHP_FLOAT_EPSILON - The smallest representable positive number x, so that x + 1.0 != 1.0
//     PHP has the following functions to check if the type of a variable is float:

//     is_float()
//     is_double() - alias of is_float()


echo PHP_FLOAT_MAX . "<br  >"; // 1.7976931348623E+308
echo PHP_FLOAT_MIN . "<br  >"; //2.2250738585072E-308
echo PHP_FLOAT_DIG . "<br  >"; // 15
echo PHP_FLOAT_EPSILON . "<br  >"; // 2.2204460492503E-16

$originalNumber = 12345.678901234567890;
echo "Original Number: $originalNumber<br>";
$roundedNumber = round($originalNumber, PHP_FLOAT_DIG);
echo "Rounded Number: $roundedNumber<br>";

// Original Number: 12345.678901234567890
// Rounded Number: 12345.6789012346
