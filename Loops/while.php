<?php

// While Loop

$n = 6;
while ($n < 10) {
    echo $n . "<br>";
    $n++;
}
// 6
// 7
// 8
// 9


$n = 6;
while ($n < 10) {
    echo $n . "<br>";
    if ($n == 8) break;
    $n++;
}
// 6
// 7
// 8