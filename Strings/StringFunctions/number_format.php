<?php

// PHP number_format() Function
// 	Formats a number with grouped thousands

// Syntax
// number_format(number,decimals,decimalpoint,separator)

$number = 9098789;
echo number_format($number)."<br>"; // 9,098,789
echo number_format($number,2)."<br>"; // 9,098,789.00
echo number_format($number,2,",","."); // 9.098.789,00
echo "<br>";

$num = 1999.9;
$formattedNum = number_format($num)."<br>";
echo $formattedNum; // 2,000
$formattedNum = number_format($num, 2);
echo $formattedNum; // 1,999.90