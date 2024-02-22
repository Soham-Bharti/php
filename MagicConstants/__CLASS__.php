<?php


// __CLASS__
// If used inside a class, the class name is returned.

class Fruits
{
    public function myValue()
    {
        return __CLASS__;
    }
}
$kiwi = new Fruits();
echo $kiwi->myValue(); // Fruits
