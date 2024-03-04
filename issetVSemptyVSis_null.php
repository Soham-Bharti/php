<?php
// $a - variable with not null value (e.g. TRUE)
// $b - variable with null value. `$b = null;`
// $c - not declared variable
// $d - variable with value that cast to FALSE (e.g. empty string, FALSE or empty array)
// $e - variable declared, but without any value assigned

/*
         |   $a  |   $b  |   $c  |   $d  |   $e  
---------+-------+-------+-------+-------+-------+-------+-------+
is_null()| FALSE | TRUE  |TRUE*W | FALSE | TRUE*W| 
---------+-------+-------+-------+-------+-------+-------+-------+
isset()  | TRUE  | FALSE | FALSE | TRUE  | FALSE |
---------+-------+-------+-------+-------+-------+-------+-------+
empty()  | FALSE | TRUE  | TRUE  | TRUE  | TRUE  | 
*/

// is_null(): Returns TRUE if a variable is null.
// isset(): Returns TRUE if a variable is declared and is not null.
// empty(): Returns TRUE if a variable is empty (or evaluates to FALSE), otherwise returns FALSE.

$a = 1;
echo "is_null() " . is_null($a) . "<br>"; //
echo "isset() " . isset($a) . "<br>"; // 1
echo "empty() " . empty($a) . "<br>"; // 

$b = null;
echo "is_null() " . is_null($b) . "<br>"; // 1
echo "isset() " . isset($b) . "<br>"; // 
echo "empty() " . empty($b) . "<br>"; // 1

echo "is_null() " . is_null($c) . "<br>"; // 1 + warning
echo "isset() " . isset($c) . "<br>"; // 
echo "empty() " . empty($c) . "<br>"; // 1

$d = "";
$d = false;
$d = [];
echo "is_null() " . is_null($d) . "<br>"; // 
echo "isset() " . isset($d) . "<br>"; // 1
echo "empty() " . empty($d) . "<br>"; // 1

$e;
echo "is_null() " . is_null($e) . "<br>"; // 1 + warning
echo "isset() " . isset($e) . "<br>"; // 
echo "empty() " . empty($e) . "<br>"; // 1