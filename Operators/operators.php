<?php

// PHP Operators

/*
PHP divides the operators in the following groups:
Arithmetic operators
Assignment operators
Comparison operators
Increment/Decrement operators
Logical operators
String operators
Array operators
Conditional assignment operators
Bitwise operators
*/




// PHP Arithmetic Operators -> +, -, *, /, %, **
// echo 6+7;
// echo 6-7;
// echo 6*7;
// echo 6/7;
// echo 6%7;
// echo 2**7;




// PHP Assignment Operators -> =, +=, -=, *=, /=, %=, **=
// $x = 10; $y = 5;
// echo $x = $y;
// echo $x += $y;
// echo $x -= $y;
// echo $x %= $y;
// echo $x /= $y;
// echo  $x **= $y;    





// PHP Comparison Operators -> == (equal), === (idential), != (not equal), !== (not identical), >, <, >=, <=, <> (not equal), <=> (spaceship)
// $x = 10;
// $y = 20;
// var_dump($x == $y);
// var_dump($x === $y);
// var_dump($x != $y);
// var_dump($x !== $y);
// var_dump($x > $y);
// var_dump($x < $y);
// var_dump($x >= $y);
// var_dump($x <= $y);
// var_dump($x <> $y);
// var_dump($x <=> $y);




// PHP Increment/Decrement Operators -> ++, --
// $x = 10;
// echo ++$x; // 11
// echo $x; // 11
// echo $x++; // 11
// echo $x; // 12
// echo --$x; // 11
// echo $x; // 11
// echo $x--; // 11
// echo $x; // 10



// PHP Logical Operators -> and, or, xor, &&, ||, !
// $x = 10;
// $y = -10;

// if ($x and $y > 0) {
//     echo "Both are +ve <br>";
// }
// if ($x or $y > 0) {
//     echo "One of them is +ve <br>";
// }

// XOR
/*
0 xor 0 = 0
0 xor 1 = 1
1 xor 0 = 1
1 xor 1 = 0
*/

// if ($x && $y > 0) {
//     echo "Both are +ve <br>";
// }
// if ($x || $y > 0) {
//     echo "One of them is +ve <br>";
// }




// Bitwise Operators
// Example	Name	Result
// $a & $b	And	Bits that are set in both $a and $b are set.
// $a | $b	Or (inclusive or)	Bits that are set in either $a or $b are set.
// $a ^ $b	Xor (exclusive or)	Bits that are set in $a or $b but not both are set.
// ~ $a	Not	Bits that are set in $a are not set, and vice versa.
// $a << $b	Shift left	Shift the bits of $a $b steps to the left (each step means "multiply by two")
// $a >> $b	Shift right	Shift the bits of $a $b steps to the right (each step means "divide by two")




// PHP String Operators -> . , .=
// $s1 = 'soham';
// $s2 = 'bharti';
// echo $s1 . $s2;

// $s1 .= $s2;
// echo $s1;



// PHP Array Operators  -> +, ==, ===, !=, <>, !==
// $x = array("a" => "red", "b" => "green");  
// $y = array("c" => "blue", "d" => "yellow");  

// print_r($x + $y); // union of $x and $y -> Array ( [a] => red [b] => green [c] => blue [d] => yellow )
// var_dump($x == $y); // bool(false) 
// var_dump($x === $y); // bool(false) 
// var_dump($x != $y); // bool(true)
// var_dump($x <> $y); // bool(true)
// var_dump($x !== $y); // bool(true)


// PHP Conditional Assignment Operators -> ?: (ternary), ?? (Null coalescing)

// ternary
// echo $status = empty($user) ? 'guest' : 'logged in';

// $user = 'soham';
// echo $status = empty($user) ? 'guest' : 'logged in';


// Null coalescing
// echo $exist = $x ?? "0";
// $x = 10;
// echo $exist = $x ?? "0";
