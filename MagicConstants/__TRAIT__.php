<?php

// __TRAIT__
// If used inside a trait, the trait name is returned.

// A trait is similar to a class, but it is intended to group functionality in a fine-grained and consistent way. Traits are used to share methods among classes in a way that avoids problems with traditional multiple inheritance.


trait MyTrait
{
    public function displayTrait()
    {
        echo "Using trait: " . __TRAIT__ . "\n";
    }
}

class MyClass
{
    use MyTrait;
}

$object = new MyClass();
$object->displayTrait(); // Output: Using trait: MyTrait