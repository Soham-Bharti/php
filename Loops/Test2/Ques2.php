<?php


// 2. Write a program to calculate and print the factorial of a number using a for loop.
// ex : factorial of 4 is 4*3*2*1= 24.

$num = 8;
$ans = 1;


// using for loop
for ($i = $num; $i > 1; $i--) {
    $ans *= $i;
}

echo "Factorial is: " . $ans . "<br>";


// using while loop
$num = 8;
$ans = 1;

while ($num > 1) {
    $ans *= $num;
    $num--;
}
echo "Factorial is: " . $ans . "<br>";


// do while loop
$num = 8;
$ans = 1;

do {
    $ans *= $num;
    $num--;
} while ($num > 1);
echo "Factorial is: " . $ans . "<br>";
