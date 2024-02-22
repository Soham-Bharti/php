<?php


// // 1-20 number (divided 2 its call bar else foo) , (divided 5 its call foobar),  using for , while , do while loop.

$num = 1;

// solved using while loop
while ($num <= 20) {
    if ($num % 5 == 0) {
        echo $num . " -> foobar <br>";
    } else if ($num % 2 == 0) {
        echo $num . " -> bar <br>";
    } else {
        echo $num . " ->foo <br>";
    }
    $num++;
}

// solved using do while loop
do {
    if ($num % 5 == 0) {
        echo $num . " -> foobar <br>";
    } else if ($num % 2 == 0) {
        echo $num . " -> bar <br>";
    } else {
        echo $num . " ->foo <br>";
    }
    $num++;
} while ($num <= 20);


// solved using forloop
for ($num = 1; $num <= 20; $num++) {
    if ($num % 5 == 0) {
        echo $num . " -> foobar <br>";
    } else if ($num % 2 == 0) {
        echo $num . " -> bar <br>";
    } else {
        echo $num . " ->foo <br>";
    }
}
