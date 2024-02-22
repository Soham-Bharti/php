<?php

// PHP implode() Function
// Returns a string from the elements of an array

// Syntax
// implode(separator,array)

$strArray = array('This', 'is', 'soham');
echo implode($strArray) . "<br>"; // Thisissoham

$strArray = array('This', 'is', 'soham');
echo implode(" ",$strArray) . "<br>"; // This is soham

// Example 2
$arr = array('Hello','World!','Beautiful','Day!');
echo implode(" ",$arr)."<br>";
echo implode("+",$arr)."<br>";
echo implode("-",$arr)."<br>";
