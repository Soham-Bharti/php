<?php

// PHP strtr() Function
// The strtr() function translates certain characters in a string.

// Note: If the from and to parameters are different in length, both will be formatted to the length of the shortest.

// Syntax
// strtr(string,from,to)
// or
// strtr(string,array)

echo strtr("Hilla Warld", "ia", "eo") . "<br>"; // Hello World

$arr = array("Hello" => "Hi", "World" => "Soham");
echo strtr("Hello World", $arr); // Hi Soham
echo "<br>";
echo strtr("hello World", $arr); // hello Soham
