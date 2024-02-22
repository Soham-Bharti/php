<?php

// Create a PHP Constant
// 1. Using define(name, value, case-insensitive);

define('S7', 'Welcome Soham Bharti! How can I help you today?'); // case sensitive
echo S7 . "<br>"; // Welcome Soham Bharti! How can I help you today?
// echo s7 . "<br>"; // Fatal error: Uncaught Error: Undefined constant "s7"

define('Greeting', 'Welcome!!!', true); // case insensitive

// echo Greeting . "<br>"; // Welcome!!!
// Warning: define(): Argument #3 ($case_insensitive) is ignored since declaration of case-insensitive constants is no longer supported in D:\Software\XAMPP\htdocs\PHP\Constants\MethodsForCreation\define.php on line 10

echo Greeting; // Welcome!!!

// echo GREETING . "<br>"; // Welcome!!! --> erro
