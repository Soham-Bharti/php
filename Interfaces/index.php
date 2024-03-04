<?php

// Interfaces
// Interfaces allow you to specify what methods a class should implement.

// Interfaces make it easy to use a variety of different classes in the same way. When one or more classes use the same interface, it is referred to as "polymorphism".

// Interfaces are declared with the interface keyword:


interface User
{
    // All interface methods must be public
    public function showName($name);
    public function showMsg();
    public function showOtherDetails($id, $salary);
}

class Employee implements User
{

    // Fatal error: Class Employee contains 3 abstract methods and must therefore be declared abstract or implement the remaining methods (User::showName, User::showMsg, User::showOtherDetails) in

    // Fatal error: Declaration of Employee::showName() must be compatible with User::showName($name) in
    // function showName()
    // {
    // }

    function showName($name)
    {
        echo "Hello " . $name . "<br>";
    }

    function showMsg()
    {
        echo "Hello from getMsg()" . "<br>";
    }

    function showOtherDetails($id, $sal)
    {
        echo "Your id is id and your salary is $sal" . "<br>";
    }
}

$obj = new Employee();
$obj->showName('soham'); // Hello soham
$obj->showMsg(); // Hello from getMsg()
$obj->showOtherDetails(2, 500000); // Your id is id and your salary is 500000

/*
PHP - Interfaces vs. Abstract Classes
Interface are similar to abstract classes. The difference between interfaces and abstract classes are:

Interfaces cannot have properties, while abstract classes can
All interface methods must be public, while abstract class methods is public or protected
All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
Classes can implement an interface while inheriting from another class at the same time

*/

// Classes can implement an interface while inheriting from another class at the same time
abstract class Hello
{
}
interface Student
{
}
class Main1 extends Hello implements Student
{
    function __construct()
    {
    }
}


// class Main2 implements Student extends Hello{}
// Parse error: syntax error, unexpected token "extends", expecting "{" in


echo "<br>";

interface Animal
{
    public function makeSound(): void;
}

class Cat implements Animal
{
    // Fatal error: Access level to Cat::makeSound() must be public (as in class Animal)
    // protected function makeSound(): void
    // {
    //     echo "Meow...<br>";
    // }

    function makeSound(): void
    {
        echo "Meow...<br>";
    }
}

class Dog implements Animal
{
    function makeSound(): void
    {
        echo "Bhaoo Bhaoo...<br>";
    }
}

class Lion implements Animal
{
    function makeSound(): void
    {
        echo "Roars...<br>";
    }
}

$catObj = new Cat();
$dogObj = new Dog();
$lionObj = new Lion();

$animalsObj = [$catObj, $dogObj, $lionObj];
foreach ($animalsObj as $obj) {
    $obj->makeSound();
}
// Meow...
// Bhaoo Bhaoo...
// Roars...