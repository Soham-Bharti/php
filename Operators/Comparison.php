<?php

// Comparison Operators

// ==	Equal	$x == $y	Returns true if $x is equal to $y	
// ===	Identical	$x === $y	Returns true if $x is equal to $y, and they are of the same type	
// !=	Not equal	$x != $y	Returns true if $x is not equal to $y	
// <>	Not equal	$x <> $y	Returns true if $x is not equal to $y	
// !==	Not identical	$x !== $y	Returns true if $x is not equal to $y, or they are not of the same type	
// >	Greater than	$x > $y	Returns true if $x is greater than $y	
// <	Less than	$x < $y	Returns true if $x is less than $y	
// >=	Greater than or equal to	$x >= $y	Returns true if $x is greater than or equal to $y	
// <=	Less than or equal to	$x <= $y	Returns true if $x is less than or equal to $y	
// <=>	Spaceship	$x <=> $y	Returns an integer less than, equal to, or greater than zero, depending on if $x is less than, equal to, or greater than $y. Introduced in PHP 7.


$x = 10;
$y = 20;

var_dump($x == $y); // bool(false)
echo '..<br>';
var_dump($x === $y); // bool(false)
echo '..<br>';
var_dump($x != $y); // bool(true)
echo '..<br>';
var_dump($x <> $y); // bool(true)
echo '..<br>';
var_dump($x !== $y); // bool(true)
echo '..<br>';
var_dump($x > $y); // bool(false)
echo '..<br>';
var_dump($x < $y); // bool(true)
echo '..<br>';
var_dump($x >= $y); // bool(false)
echo '..<br>';
var_dump($x <= $y); // bool(true)
echo '..<br>';

var_dump($x <=> $y); // int(-1)
echo '..<br>';

$x = 20;
$y = 10;
var_dump($x <=> $y); // int(1)
echo '..<br>';

$x = 10;
$y = 10;
var_dump($x <=> $y); // int(0)