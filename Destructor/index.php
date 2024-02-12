<?php

// Destrcutor
// The destructor's main purpose is to perform any cleanup or finalization tasks for the object, such as closing database connections, releasing resources, or flushing buffers.
class User
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function __destruct()
    {
        echo 'I am called ' . $this->name . " - " . $this->age;
    }
}

$user1 = new User("soham", 22);
$user2 = new User("amaresh", 24);

// I am called amaresh - 24
// I am called soham - 22