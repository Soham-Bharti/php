<?php

// PHP str_pad() Function
// The str_pad() function pads a string to a new length.

// Syntax
// str_pad(string,length,pad_string,pad_type)

// pad_type	Optional. Specifies what side to pad the string.
// Possible values:

// STR_PAD_BOTH - Pad to both sides of the string. If not an even number, the right side gets the extra padding
// STR_PAD_LEFT - Pad to the left side of the string
// STR_PAD_RIGHT - Pad to the right side of the string. This is default

$str = "Hello World";
echo str_pad($str,20,'*', STR_PAD_BOTH); // ****Hello World*****
echo "<br>";
echo str_pad($str,20,'*', STR_PAD_LEFT); // *********Hello World
echo "<br>";
echo str_pad($str,20,'*', STR_PAD_RIGHT); // Hello World*********
echo "<br>";

// by default padded to right side of string
$str = "Hello World";
echo str_pad($str,20,".");
