<?php

// PHP similar_text() Function
//	Calculates the similarity between two strings

// Syntax
// similar_text(string1,string2,percent)

$str1 = "Hello, world";
$str2 = "Hello, soham";
echo similar_text($str1,$str2); // 7

similar_text($str1,$str2, $percent);
echo $percent; // 866.666666666667
echo "<br>";

$str1 = "1234 5678";
$str2 = "123 6721";
echo similar_text($str1,$str2); // 