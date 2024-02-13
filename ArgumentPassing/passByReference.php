<?php


function show(&$val) // holds the memory address of the variable
{
    $val = 10;
    echo $val;
}

$a = 5;
// The value passed by reference is permanently modified as whole reference of the value has been passed to the function (DO AFFECTs THE ACTUAL VALUE)
show($a); // 10 -> yaha par $a pura ka pura variable uth ke gya hai show() me
echo "<br>" . $a; // 10 -> affected the value   
