<?php

// String Operations

// .	Concatenation	$txt1 . $txt2	Concatenation of $txt1 and $txt2	
// .=	Concatenation assignment	$txt1 .= $txt2	Appends $txt2 to $txt1

$str1 = "Soham";
$str2 = "Bharti";

echo $str1 . $str2 . "<br>"; // SohamBharti

$str1 .= $str2;
echo $str1; // SohamBharti
