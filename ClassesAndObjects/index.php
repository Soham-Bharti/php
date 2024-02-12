<?php


// A class is a template for objects, and an object is an instance of class.


class User
{
    public $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$user1 = new User();
var_dump($user1 instanceof User); // bool(true)

$user1->setName("Soham Bharti");
echo $user1->getName(); // Soham Bharti