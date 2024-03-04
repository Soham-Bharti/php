<?php

// PHP - Static Properties
// Static properties can be called directly - without creating an instance of a class.

// Static properties are declared with the static keyword:
class A
{
    public static $staticName = 'Soham Bharti';
}

// To access a static property use the class name, double colon (::), and the property name:
echo A::$staticName; // Soham Bharti
echo "<br>";


// A class can have both static and non-static properties. A static property can be accessed from a method in the same class using the self keyword and double colon (::):

class Pi
{
    public static $piVal = 3.14159;

    public function staticVal()
    {
        echo self::$piVal;
    }
}
$obj = new Pi();
$obj->staticVal(); // 3.14159

echo "<br>";
// To call a static property from a child class, use the parent keyword inside the child class:

class B
{
    public static $piVal = 3.14159;
}
class C extends B
{
    function __construct()
    {
        echo parent::$piVal;
    }
}
// or get value of static property via xStatic() method
new C(); // 3.14159

// Get value of static property directly via child class
echo C::$piVal; // 3.14159