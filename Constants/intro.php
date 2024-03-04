<?php

// PHP - Class Constants
// Class constants can be useful if you need to define some constant data within a class.

// A class constant is declared inside a class with the const keyword.

// A constant cannot be changed once it is declared.

// Class constants are case-sensitive. However, it is recommended to name the constants in all uppercase letters.

// We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name, like here:

class Constant
{
    const GREET = "Welcome to the world of PHP";
    function __construct()
    {
        echo self::GREET;
    }
    // const GREET = "Welcome to the world of Laravel"; // Cannot redefine class constant Constant::GREET
}

echo Constant::GREET . "<br>"; // Welcome to the world of PHP

// Or, we can access a constant from inside the class by using the self keyword followed by the scope resolution operator (::) followed by the constant name, like here:

class GoodBye
{
    const LEAVE_MSG = "Thank you, please visit again!";

    public function showMsg()
    {
        echo self::LEAVE_MSG;
    }
}

$obj = new GoodBye();
$obj->showMsg(); // Thank you, please visit again!


echo "<br>";

// Note:
// Class constants can be redefined by a child class. As of PHP 8.1.0, class constants cannot be redefined by a child class if it is defined as final.

class Child1 extends Constant
{
}
$child1Obj = new Child1(); // Welcome to the world of PHP

echo "<br>";

class Child2 extends Constant
{
    const GREET = "Welcome to the world of Laravel";
    function __construct()
    {
        echo self::GREET;
    }
}
$child2Obj = new Child2(); // Welcome to the world of Laravel


// Normal constant, not a class constant
echo "<br>";
const GREET = "Welcome to the world of Java";
echo GREET; // Welcome to the world of Java
