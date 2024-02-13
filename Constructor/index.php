<?php

// Constructor
class User
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function getDeatils()
    {
        echo $this->name . " - " . $this->age;
    }
}

$user1 = new User("soham", 22);
$user2 = new User("amaresh", 24);

$user1->getDeatils(); // soham - 22
$user2->getDeatils(); // amaresh - 24