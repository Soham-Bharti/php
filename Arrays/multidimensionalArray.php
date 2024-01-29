<?php

// PHP Multidimensional Arrays
// A multidimensional array is an array containing one or more arrays.

// PHP supports multidimensional arrays that are two, three, four, five, or more levels deep. However, arrays more than three levels deep are hard to manage for most people.


// PHP - Two-dimensional Arrays
// Name	        Stock	Sold
// Volvo	    22	    18
// BMW	        15	    13
// Saab	        5	    2
// Land Rover	17	    15

$cars = array(
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Land Rover", 17, 15)
);

echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".<br>";
echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".<br>";
echo $cars[2][0] . ": In stock: " . $cars[2][1] . ", sold: " . $cars[2][2] . ".<br>";
echo $cars[3][0] . ": In stock: " . $cars[3][1] . ", sold: " . $cars[3][2] . ".<br>";
// Volvo: In stock: 22, sold: 18.
// BMW: In stock: 15, sold: 13.
// Saab: In stock: 5, sold: 2.
// Land Rover: In stock: 17, sold: 15.

for ($i = 0; $i < count($cars); $i++) {
    echo "<h2>Row Number: $i</h2>";
    echo "<ul>";
    for ($j = 0; $j < count($cars[0]); $j++) {
        echo "<li>" . $cars[$i][$j] . "</li>";
    }
    echo "</ul>";
}


// Row Number: 0
// Volvo
// 22
// 18
// Row Number: 1
// BMW
// 15
// 13
// Row Number: 2
// Saab
// 5
// 2
// Row Number: 3
// Land Rover
// 17
// 15
