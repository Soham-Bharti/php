<?php

// ClassName::class
// Returns the name of the specified class and the name of the namespace, if any.

namespace myArea;

class Fruits
{
    public function myValue()
    {
        return Fruits::class;
    }
}

$kiwi = new Fruits();
echo $kiwi->myValue(); // myArea\Fruits
