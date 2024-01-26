<?php


// 3. Write a program which will give you all of the potential combinations of a two-digit decimal combination, printed in a comma delimited format : 00, 01, 02, 03, 04.  Use number 10

// using for loop
for ($i = 0; $i <= 1; $i++) {
    for ($j = 0; $j <= 9; $j++) {
        // $comb = sprintf("%d", $i) . sprintf("%d", $j);
        // echo $comb . ", ";
        echo $i . $j . ", ";
        if ($i == 1) break;
    }
}

echo "<br";

// using while loop
$i = 0;
while ($i <= 1) {
    $j = 0;
    while ($j <= 9) {
        // $comb = sprintf("%d", $i) . sprintf("%d", $j);
        // echo $comb . ", ";
        echo $i . $j . ", ";
        if ($i == 1) break;
        $j++;
    }
    $i++;
}


// do while loops
$i = 0;
do {
    $j = 0;
    do {
        // $comb = sprintf("%d", $i) . sprintf("%d", $j);
        // echo $comb . ", ";
        echo $i . $j . ", ";
        if ($i == 1) break;
        $j++;
    } while ($j <= 9);
    $i++;
} while ($i <= 1);
