<?php

// Iterables
// PHP - What is an Iterable?
// An iterable is any value which can be looped through with a foreach() loop.

// The iterable pseudo-type was introduced in PHP 7.1, and it can be used as a data type for function arguments and function return values.



// Use an iterable function argument:
function printVal(iterable $myIterable)
{
    foreach ($myIterable as $x) {
        echo $x;
    }
}

$array = array(1, 2, 3, 4, 5, 6, 7);
printVal($array); // 1234567

echo "<br>";


// Return an iterable:
function getIterable(): iterable
{
    return [1, 2, 3, 4, 5];
}

$myOwnIterable = getIterable();

foreach ($myOwnIterable as $y) {
    echo $y;
}
// 12345

