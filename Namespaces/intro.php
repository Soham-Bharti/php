<?php

// Namespaces

// Namespaces are qualifiers that solve two different problems:
// They allow for better organization by grouping classes that work together to perform a task
// They allow the same name to be used for more than one class


require 'namespaces.php';

// $obj = new Test(); // Fatal error: Uncaught Error: Class "Test" not found in

$obj1 = new first\Test(); // Called class Test constructor from first namespace

echo "<br>";

$obj2 = new second\Test(); // Called class Test constructor from second namespace


// What if we don't have two same name classes but have same name functions
function sayHello()
{
    echo "Hello from intro.php";
}

// Priority to executing file
sayHello(); // Hello from intro.php

first\sayHello(); // Hello from first namespace from namespace.php
