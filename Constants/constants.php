<?php

// PHP Constants

// Create a PHP Constant
define('GREETINGS', 'Welcome to PHP');
echo GREETINGS;

// define('GREET', 'Welcome to PHP by soham', true); --> no longer supported
// echo greet; 


// PHP const Keyword

const MYCAR = 'Volvo';
echo MYCAR;


// const are always case-sensitive
// define() has has a case-insensitive option.
// const cannot be created inside another block scope, like inside a function or inside an if statement.
// define can be created inside another block scope.

// PHP Constant Arrays
define("cars", [
    "Alfa Romeo",
    "BMW",
    "Toyota"
]);
echo var_dump(cars);



// Constants are Global
// This example uses a constant inside a function, even if it is defined outside the function:
define("GREETING", "Welcome to PHP!");

function myTest()
{
    echo GREETING;
}

myTest();
