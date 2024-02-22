<?php

// 1-20 number (divided 2 its call bar else foo) , (divided 5 its call foobar),  using for , while , do while loop.
//  make simple function for task 3. using switch case. give user choice .

$num = 1;
while ($num <= 20) {
    switch ($num) {
        case $num % 5 == 0: {
                echo $num . " ->foobar <br>";
                break;
            }
        case $num % 2 == 0: {
                echo $num . " ->bar <br>";
                break;
            }
        default:
            echo $num . " ->foo <br>";
    }
    $num++;
}
