<?php

// PHP only supports single inheritance: a child class can inherit only from one single parent.

// So, what if a class needs to inherit multiple behaviors? OOP traits solve this problem.

// Traits are used to declare methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).

// Traits are declared with the trait keyword:

trait MyTrait
{
    function sayHello()
    {
        echo "Hello there!";
    }
}

trait Bye
{
    function sayBye()
    {
        echo "Bye there!";
    }
}

class Main
{
    use MyTrait, Bye;
}

$mainObj = new Main();
$mainObj->sayHello(); // Hello there!
echo "<br>";
$mainObj->sayBye(); // Bye there!


// multiple functions in single trait
trait PersonActions
{
    function walk()
    {
        echo "Walking...";
    }
    function speak()
    {
        echo "Speaking...";
    }
}

class User
{
    use PersonActions;
}

$obj = new User();
$obj->walk(); // Walking...
$obj->speak(); // Speaking...


echo "<br>";


// Method overriding
// Priority: Base class, trait, inherited parent class

trait Msg
{
    function showMsg()
    { // 2nd highest priority
        echo "Hi";
    }
}
class A
{
    function showMsg()
    { // last priority
        echo "Hello";
    }
}
class B extends A
{
    use Msg;
    function showMsg()
    { // highest priority
        echo "Good afternoon";
    }
}

$bObj = new B();
$bObj->showMsg(); // Good afternoon
echo "<br>";

// What if we have same function in two different traits and they are used in a class
trait Hi
{
    function sayHello()
    {
        echo 'Hello from Hi trait';
    }
}
trait Hello
{
    function sayHello()
    {
        echo 'Hello from Hello trait';
    }
}
// class D{
//     use Hello, Hi;
// }
// $dObj = new D();
// $dObj->sayHello(); // Fatal error: Trait method Hi::sayHello has not been applied as D::sayHello, because of collision with Hello::sayHello in
class D
{
    use Hello, Hi {
        Hello::sayHello insteadof Hi;
        Hi::sayHello as newHello;
    }
}
$dObj = new D();
$dObj->sayHello(); // Hello from Hello trait
$dObj->newHello(); // Hello from Hi trait
echo "<br>";

trait privateMethod
{
    private function show()
    {
        echo "Showing...";
    }
}

// class Soham{
//     use privateMethod;
// }
// $obj = new Soham();
// $obj->show(); // Fatal error: Uncaught Error: Call to private method Soham::show() from global scope

class Soham
{
    use privateMethod {
        privateMethod::show as public;
    }
    use privateMethod {
        privateMethod::show as public sayHello;
    }
}
$obj = new Soham();
$obj->show(); // Showing...
$obj->sayHello(); // Showing...