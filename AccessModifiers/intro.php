<?php

// PHP - Access Modifiers
/*
There are three access modifiers:

public - the property or method can be accessed from everywhere. This is default
protected - the property or method can be accessed within the class and by classes derived from that class
private - the property or method can ONLY be accessed within the class
*/

class Fruit
{
    public $name;
    protected $price;
    private $color;
}

$obj = new Fruit();
$obj->name = "Mango";

// $obj->price = 200; // Fatal error: Uncaught Error: Cannot access protected property Fruit::$price in
// $obj->color = 'red'; // Fatal error: Uncaught Error: Cannot access private property Fruit::$color


class User
{
    public $name;
    public $age;
    public $password;

    function setName($nameKya)
    {
        $this->name = $nameKya;
    }
    protected function setAge($ageKya)
    {
        $this->age = $ageKya;
    }
    private function setPassword($passwordKya)
    {
        $this->password = $passwordKya;
    }
}

$user1 = new User();
$user1->setName("soham");
// $user1->setAge(22); // Fatal error: Uncaught Error: Call to protected method User::setAge() from global scope in
// $user1->setPassword("password123"); // Fatal error: Uncaught Error: Call to private method User::setPassword() from global scope in

print_r($user1); // User Object ( [name] => soham [age] => [password] => )