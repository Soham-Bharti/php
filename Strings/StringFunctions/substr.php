<?php

// PHP substr() Function
// The substr() function returns a part of a string.

// Syntax
// substr(string,start,length)

$str = "Hello Soham! Wassup?";

echo substr($str, 0) . "<br>"; // Hello Soham! Wassup?
echo substr($str, 5) . "<br>"; // Soham! Wassup?
echo substr($str, 5, 7) . "<br>"; // Soham! 
echo substr($str, 5, 6) . "<br>"; // Soham

echo substr("Hello world", -1) . "<br>"; // d
echo substr("Hello world", -10) . "<br>"; // ello world
echo substr("Hello world", -8) . "<br>"; // lo world
echo substr("Hello world", -4) . "<br>"; // orld
