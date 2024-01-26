<?php

// Loosely typed language -> automatically associats a data type to the variable 
$mobile = 9098789871;
$firstName = 'Soham';
$lastName = "Bharti";
$price = 98.77;
$students = array("Soham", "Abhi", "Mo", "Punit");
$eligible = false;

var_dump($mobile);
var_dump($firstName);
var_dump($lastName);
var_dump($price);
var_dump($students);
var_dump($eligible);

// all below are different variables
$age = 10;
$Age = 11;
$AGE = 12;
$aGE = 13;
$agE = 14; 
$AgE = 15;
$aGe = 16;

// output variable
echo($age);
echo($Age);
echo($AGE);
echo($aGE);
echo($agE);
echo($AgE);
echo($aGe);

// assigning multiple values
$val1 = $val2 = $val3 = 10;

$_validVariabe1 = 10; // valid
$_10validVariabe2 = 11; // valid
$VALIDVARIABLE = 12; // valid
$validVariable_11 = 12; // valid

// $invalidVariable-11 = 12; // invalid -> Parse error: syntax error, unexpected token "="
// $10invalidVariabe = 12; // invalid -> Parse error: syntax error, unexpected integer "10"
// $invalid*age = 27; // invalid -> Parse error: syntax error, unexpected token "="
// $(invalidVariable = 11; // invalid -> Parse error: syntax error, unexpected token "("