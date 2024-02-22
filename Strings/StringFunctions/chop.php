<?php

// PHP chop() Function
// Removes whitespace or other characters from the right end of a string

$str = "Hello World!";
echo $str . "<br>";
echo chop($str, "World!") . "<br>"; // Hello

$str = "Hello World!\n\n";
echo $str . "<br>";
echo chop($str) . "<br>"; // Hello World!

// will not remove anything as parameters beelow are from left
$str = "Hello World!";
echo chop($str, "Hello") . "<br>"; // Hello World!

$str = "Hello World!";
echo $str . "<br>";
echo chop($str, "!") . "<br>"; // Hello World

$str = "Hello World!";
echo $str . "<br>";
echo chop($str, "d!") . "<br>"; // Hello Worl