<?php

// for loop
for ($x = 0; $x <= 100; $x += 10) {
    echo "The number is: $x <br>";
}
// The number is: 0
// The number is: 10
// The number is: 20
// The number is: 30
// The number is: 40
// The number is: 50
// The number is: 60
// The number is: 70
// The number is: 80
// The number is: 90
// The number is: 100


for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) continue;
    echo "The number is: $x <br>";
}
// The number is: 0
// The number is: 1
// The number is: 2
// The number is: 4
// The number is: 5
// The number is: 6
// The number is: 7
// The number is: 8
// The number is: 9
// The number is: 10

for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) break;
    echo "The number is: $x <br>";
}
// The number is: 0
// The number is: 1
// The number is: 2
