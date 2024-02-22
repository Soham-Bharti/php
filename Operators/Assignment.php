<?php


// Assignment Operations


// Assignment	Same as...	Description	Try it
// x = y	x = y	    The left operand gets set to the value of the expression 
// x += y	x = x + y	Addition	
// x -= y	x = x - y	Subtraction	
// x *= y	x = x * y	Multiplication	
// x /= y	x = x / y	Division	
// x %= y	x = x % y	Modulus

$x = 10;
$y = 20;


$z = $y;
echo $z . "<br>"; // 20
$z += $y;
echo $z . "<br>"; // 40
$z -= $y;
echo $z . "<br>"; // 20
$z *= $y;
echo $z . "<br>"; // 400
$z /= $y;
echo $z . "<br>"; // 20
$z %= $y;
echo $z . "<br>"; // 0
