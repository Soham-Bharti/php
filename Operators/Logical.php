<?php

// Logical Operators

// and	And	$x and $y	True if both $x and $y are true	
// or	Or	$x or $y	True if either $x or $y is true	
// xor	Xor	$x xor $y	True if either $x or $y is true, but not both	
// &&	And	$x && $y	True if both $x and $y are true	
// ||	Or	$x || $y	True if either $x or $y is true	
// !	Not	!$x	True if $x is not true


$x = 10;
$y = "10";

if ($x == 10 and $y == 10) {
    echo "Both are technically same <br>";
}


if ($x == 10 and $y === 10) {
    echo "Both are technically same <br>";
} else {
    echo "Both are not identical <br>";
}

if ($x == 10 && $y == 10) {
    echo "Both are technically same <br>";
}


if ($x == 10 && $y === 10) {
    echo "Both are technically same <br>";
} else {
    echo "Both are not identical <br>";
}

if ($x == 10 || $y === 10) {
    echo "Both are technically same <br>";
}


// XOR -> true if either of them is true
$x = true;
$y = true;

var_dump($x xor $y); // bool(false)
var_dump($x xor !$y); // bool(true)
