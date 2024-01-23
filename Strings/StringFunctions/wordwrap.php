<?php

// PHP wordwrap() Function
// The wordwrap() function wraps a string into new lines when it reaches a specific length.

// Syntax
// wordwrap(string,width,break,cut)

$str = "Hello there, My name is Soham_Bharti";
echo wordwrap($str, 10, "<br>");

echo "<br> *** Word wrapping *** <br>";
$str = "Hello there, My name is Soham_Bharti";
echo wordwrap($str, 10, "<br>", true);
