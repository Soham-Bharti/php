<?php


// PHP - Static Methods
// Static methods can be called directly - without creating an instance of the class first.

// Static methods are declared with the static keyword:

class Soham
{
    public static function saySoham()
    {
        echo "So-humming...";
    }
}

// To access a static method use the class name, double colon (::), and the method name:
Soham::saySoham(); // So-humming...


// A class can have both static and non-static methods. A static method can be accessed from a method in the same class using the self keyword and double colon (::):
class Main
{
    public static function sayHello()
    {
        echo "Hello, world!";
    }

    public function __construct()
    {
        self::sayHello();
    }
}
new Main(); // Hello, world!
$obj = new Main(); // Hello, world!

// Static methods can also be called from methods in other classes. To do this, the static method should be public:
class A
{
    public static function sayHello()
    {
        echo "Hello, world!";
    }
}
class B extends A
{
    function msg()
    {
        A::sayHello();
    }
}
echo "<br>";
$obj = new B();
$obj->msg(); // Hello, world!


echo "<br>";
// To call a static method from a child class, use the parent keyword inside the child class. Here, the static method can be public or protected.
class User
{
    protected function getName()
    {
        echo "Name is S7!";
    }
}

class Student extends User
{
    public $name;
    public function __construct()
    {
        $this->name = parent::getName();
    }
}
new Student(); // Name is S7!
