<?php

// PHP ltrim() Function
// Removes whitespace or other characters from the left side of a string

$str = "Soham Bharti";
echo $str . "<br>"; // Soham Bharti
echo ltrim($str, "Soham") . "<br>"; // Bharti
echo ltrim($str, "Soham Bh") . "<br>"; // rti
echo ltrim($str, "Soham Bha") . "<br>"; // rti
echo ltrim($str, "B") . "<br>"; // Soham Bharti
echo ltrim($str, "Bharti") . "<br>"; // Soham Bharti
echo ltrim($str, " Bharti") . "<br>"; // Soham Bharti


$str = "    Hello World!";
echo "Without ltrim: " . $str;
echo "<br>";
echo "With ltrim: " . ltrim($str);
echo "<br>";
