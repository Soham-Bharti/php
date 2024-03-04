<?php

// Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.

// An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.

// An abstract class or method is defined with the abstract keyword:

abstract class User
{
    function greet1()
    {
        echo "Hello from a abstarct class function";
    }
    function greet2()
    {
    }
    function greet3()
    {
    }
}

// we can not create objects of an abstract class
// $obj = new User(); // Fatal error: Uncaught Error: Cannot instantiate abstract class User


// we can create an object of a class that inherits the abstract class
class Admin extends User
{
    function greet2()
    {
        echo "Hello from a class that inherits the abstract class";
    }
}

$obj = new Admin();
$obj->greet1(); // Hello from a abstarct class function
echo "<br>";
$obj->greet2(); // Hello from a class that inherits the abstract class
echo "<br>";
$obj->greet3(); // (nothing as we have not completed the function yet)

echo "<br>";


/*
When inheriting from an abstract class, the child class method must be defined with the same name, and the same or a less restricted access modifier. So, if the abstract method is defined as protected, the child class method must be defined as either protected or public, but not private. Also, the type and number of required arguments must be the same. However, the child classes may have optional arguments in addition.

So, when a child class is inherited from an abstract class, we have the following rules:

The child class method must be defined with the same name and it redeclares the parent abstract method
The child class method must be defined with the same or a less restricted access modifier
The number of required arguments must be the same. However, the child class may have optional arguments in addition
*/

// Parent class
abstract class Fruit
{
    public $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function intro();
}

// Child classes
class Strawberry extends Fruit
{
    function intro()
    {
        echo "Hi, I am a red $this->name";
    }
}
class Mango extends Fruit
{
    function intro()
    {
        echo "Hi, I am a orange $this->name";
    }
}
class Banana extends Fruit
{
    function intro()
    {
        echo "Hi, I am a yellove $this->name";
    }
}

$obj1 = new Strawberry("Straw-berry");
$obj1->intro(); // Hi, I am a red Straw-berry
echo "<br>";

$obj2 = new Mango('Man-go');
$obj2->intro(); // Hi, I am a orange Man-go
echo "<br>";

$obj3 = new Banana('Bana-na');
$obj3->intro(); // Hi, I am a yellove Bana-na

echo "<br>";


abstract class ParentClass
{
    //  function __construct($name) :string{} Method ParentClass::__construct() cannot declare a return type
    protected abstract function showName($name): string;
}

class ChildClass extends ParentClass
{
    // The child class may define optional arguments that is not in the parent's abstract method
    public function showName($name, $age = 20): string
    {
        return "Hello " . $name . " your age is " . $age;
    }

    // Fatal error: Cannot redeclare ChildClass::showName() in
    // function showName($name, $age): string
    // {
    //     return "Hello " . $name;
    // }
}

$obj = new ChildClass();
echo $obj->showName('Soham') . "<br>"; // Hello Soham your age is 20
echo $obj->showName('Soham', 22) . "<br>"; // Hello Soham your age is 22
