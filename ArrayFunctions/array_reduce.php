<?php


// array_reduce()
// The array_reduce() function sends the values in an array to a user-defined function, and returns a string.

// Note: If the array is empty and initial is not passed, this function returns NULL.


// Syntax
// array_reduce(array, myfunction, initial)

function fun($x, $y)
{
    return ucfirst($x) . ucfirst($y);
}

$arr = array('hello', 'soham', 'okay');

echo array_reduce($arr, "fun") . "<br>"; // HelloSohamOkay


function myfunction($v1, $v2)
{
    return $v1 . "-" . $v2;
}
$a = array("Dog", "Cat", "Horse");
echo (array_reduce($a, "myfunction") . "<br>"); // -Dog-Cat-Horse


$a = array("Dog", "Cat", "Horse");
echo (array_reduce($a, "myfunction", 5) . "<br>"); // 5-Dog-Cat-Horse


function sum($x, $y)
{
    return $x + $y;
}

$arr = array(1, 2, 3, 4, 5);
var_dump(array_reduce($arr, 'sum')); // int(15)

function factorial($n)
{
    // create an array of numbers from 1 to n
    $array = range(1, $n);
    // use array_reduce to multiply all the numbers in the array
    $factorial = array_reduce($array, function ($carry, $item) {
        return $carry * $item;
    }, 1);
    // return the factorial value
    return $factorial;
}
echo factorial(5); // 120
