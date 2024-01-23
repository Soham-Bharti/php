<?php

// PHP trim() Function
// The trim() function removes whitespace and other predefined characters from both sides of a string.

// Syntax
// trim(string,charlist)


echo trim("Hello Soham!", "Hm") . "<br>"; // ello Soham!
echo trim("Hello Soham!", "Hm!") . "<br>"; // ello Soha

$str = " Hello World! ";
echo "Without trim: " . $str; // Without trim: Hello World!
echo "<br>";
echo "With trim: " . trim($str); // With trim: Hello World!
