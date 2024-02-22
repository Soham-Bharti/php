<?php

// Cast to Array

$int = 7;
$float = 9.9;
$str = "Hello";
$str1 = "Hello soham";
$bool = true;
$null = NULL;
$nan = NAN;

var_dump((array)$int); // array(1) { [0]=> int(7) }
echo "<br>";
var_dump((array)$float); // array(1) { [0]=> float(9.9) }
echo "<br>";
var_dump((array)$str); // array(1) { [0]=> string(5) "Hello" }
echo "<br>";
var_dump((array)$str1); // array(1) { [0]=> string(11) "Hello soham" }
echo "<br>";
var_dump((array)$bool); // array(1) { [0]=> bool(true) }
echo "<br>";
var_dump((array)$null); // array(0) { }
echo "<br>";
var_dump((array)$nan); // array(1) { [0]=> float(NAN) }
echo "<br>";

// When converting into arrays, most data types converts into an indexed array with one element.

// NULL values converts to an empty array object.

// Objects converts into associative arrays where the property names becomes the keys and the property values becomes the values:

// Converting Objects into Arrays:
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My car is a " . $this->color . " " . $this->model . "!";
    }
  }
  
  $myCar = new Car("red", "Volvo");
  
  $myCar = (array) $myCar;
  var_dump($myCar); // array(2) { ["color"]=> string(3) "red" ["model"]=> string(5) "Volvo" }
