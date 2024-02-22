<?php

// Inheritance

class Car
{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro()
    {
        echo "The Car is {$this->name} and the color is {$this->color}.";
    }
}

class BMW extends Car
{
    function sppedUp()
    {
        echo "Speeding up...";
    }
}

$obj = new BMW("BMW V1.0", "red");
print_r($obj); // BMW Object ( [name] => BMW V1.0 [color] => red )

$obj->sppedUp(); // Speeding up...


// PHP - Inheritance and the Protected Access Modifier
class Fruit
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    protected function intro()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

class Strawberry extends Fruit
{
    public function msg()
    {
        echo "I am berry!";
    }
}

// __construct() is public
$obj = new Strawberry("Berry Ji", 'red');
print_r($obj); // Strawberry Object ( [name] => Berry Ji [color] => red )

// msg() is public
$obj->msg(); // I am berry!

// intro() is protected
// $obj->intro(); // Fatal error: Uncaught Error: Call to protected method Fruit::intro() from global scope


class Strawberry2 extends Fruit
{
    public function msg()
    {
        echo "I am berry!";
        $this->intro();
    }
}

// __construct() is public
$strawberry = new Strawberry2("Strawberry", "red");

// msg() is public and it calls intro() (which is protected) from within the derived class
$strawberry->msg(); // I am berry!The fruit is Strawberry and the color is red.


// PHP - Overriding Inherited Methods
class Strawberry3 extends Fruit
{
    public $weight;
    public function __construct($name, $color, $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }
    public function intro()
    {
        echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }
}

$strawberry = new Strawberry3("Strawberry", "red", 50);
$strawberry->intro(); // The fruit is Strawberry, the color is red, and the weight is 50 gram.


// PHP - The final Keyword
// The final keyword can be used to prevent class inheritance or to prevent method overriding.

final class Student
{
    public $name;

    function __construct($studentName)
    {
        $this->name = $studentName;
    }
}
// class Soham extends Student {} // Fatal error: Class Soham cannot extend final class Student in
