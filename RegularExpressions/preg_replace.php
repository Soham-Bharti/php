<?php

// preg_replace()
// The preg_replace() function will replace all of the matches of the pattern in a string with another string.

$str = "Visit Microsoft!";
$pattern = "/microsoft/i";
echo preg_replace($pattern, "SilverSky Technology", $str) . "<br>"; // Visit SilverSky Technology!

$str = "Visit Microsoft!";
$pattern = "/microsoft/";
echo preg_replace($pattern, "SilverSky Technology", $str) . "<br>"; // Visit Microsoft!

$str = "Visit Microsoft!";
$pattern = "/microsoft/";
echo preg_replace($pattern, "SilverSky Technology", $str) . "<br>"; // Visit Microsoft!

$name = "Soham Bharti";
$pattern = "/h/i";
echo preg_replace($pattern, "n",  $name); // Sonam Bnarti
