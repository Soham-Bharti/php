<?php


function show($val)
{
    $val = 10;
    echo $val;
}

$a = 5;
// The value passed by value is not permanently modified only modify it temporarily as copy of the value has been passed to the function (DOES NOT AFFECT THE ACTUAL VALUE)
show($a); // 10 -> yaha par $a ki ek copy gyi hai show() me
echo "<br>" . $a; // 5
