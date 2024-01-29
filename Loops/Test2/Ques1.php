<?php


// 1. Create a script to construct the following pattern.
/*
1
1 2
1 2 3
1 2 3 4
1 2 3 4 5
*/


// using for loop
for ($i = 1; $i <= 5; $i++) {

    // priting numbers till $i
    for ($j = 1; $j <= $i; $j++) {
        echo $j . ' ';
    }

    // adding a break 
    echo "<br>";
}


// using while loop

$i = 1;
while ($i <= 5) {
    $j = 1;
    while ($j <= $i) {
        echo $j . " ";
        $j++;
    }

    echo "<br>";

    $i++;
}


// using do while loop

$i = 1;
do {
    $j = 1;
    do {
        echo $j . " ";
        $j++;
    } while ($j <= $i);
    echo "<br>";

    $i++;
} while ($i <= 5);
