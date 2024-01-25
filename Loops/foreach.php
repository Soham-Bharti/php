<?php


// foreach


// indexed array
$arr = array("1", 2, 3, "soham",  4, 5);

foreach ($arr as $x) {
    echo $x;
}
// 123soham45

echo "<br>";

// associative array
$brr = array('car1' => 'alto', 'car2' => 'bmw', 'car3' => 'ford');
foreach ($brr as $x) {
    echo $x;
}
// altobmwford

echo "<br>";

foreach ($brr as $x => $y) {
    echo $x . ' ' . $y;
}
// car1 altocar2 bmwcar3 ford

echo "<br>";

$brr = array(2, 5, 'car1' => 'alto', 'car2' => 'bmw', 'car3' => 'ford', "soham");
var_dump($brr);

echo "<br>";

foreach ($brr as $x => $y) {
    echo $x . ' ' . $y . "<br>";
}
// 0 2
// 1 5
// car1 alto
// car2 bmw
// car3 ford
// 2 soham


echo "<br>";

// By default, changing an array item will not affect the original array:
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
    if ($x == "blue") $x = "pink";
}

var_dump($colors);


echo "<br>";

// BUT, by using the & character in the foreach declaration, the array item is assigned by reference, which results in any changes done to the array item will also be done to the original array:

// By assigning the array items by reference, changes will affect the original array:


$colors = array("red", "green", "blue", "yellow");

foreach ($colors as &$x) {
    if ($x == "blue") $x = "pink";
}

var_dump($colors);

echo "<br>";

// Alternative Syntax
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) :
    echo "$x <br>";
endforeach;
