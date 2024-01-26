<?php

// PHP rtrim() FunctionPHP rtrim() Function
// Removes whitespace or other characters from the right side of a string


$str = "Hello World!";
echo rtrim($str, "!"); // Hello World
echo "<br>";
echo rtrim($str, "d!"); // Hello Worl
echo "<br>";
echo rtrim($str, "World!"); // Hello
echo "<br>";
echo rtrim($str, "world!"); // Hello W
echo "<br>";