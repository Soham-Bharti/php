<?php

// $GLOBALS
// $GLOBALS is an array that contains all global variables.



// Global variables are variables that can be accessed from any scope.

// Variables of the outer most scope are automatically global variables, and can be used by any scope, e.g. inside a function.

// To use a global variable inside a function you have to either define them as global with the global keyword, or refer to them by using the $GLOBALS syntax.


$number = 10;

// Accessing variables outside their scope
function displayNum()
{
    // echo $number; // Warning: Undefined variable $number 

    // Method 1: Using $GLOBALS['nameOfVariable']
    echo $GLOBALS['number']; // 10

    // Method 2: Using global
    global $number;
    echo $number;
    // echo global $number; // Parse error: syntax error, unexpected token "global"
}
// displayNum();


// Create Global Variables
$num = 11;
echo $num . "<br>"; // 11
echo $GLOBALS['num'] . "<br>"; // 11

function newFun()
{
    $GLOBALS['x'] = 100;
}
// echo $x; // Warning: Undefined variable $x 
// echo $GLOBALS['x'] . "<br>"; // Warning: Undefined global variable $x

// variables under the scope of a function can be accessed like this...
newFun();
echo $GLOBALS['x'] . "<br>"; // 100
echo $x; // 100
