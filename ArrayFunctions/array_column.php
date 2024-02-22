<?php

// array_column()
// The array_column() function returns the values from a single column in the input array.

// Syntax
// array_column(array, column_key, index_key)

$userDetails = array(
    array(
        'id' => 27,
        'first_name' => 'Soham',
        'last_name' => 'Bharti',
    ),
    array(
        'id' => 6761,
        'first_name' => 'Anant',
        'last_name' => 'Mishra',
    ),
    array(
        'id' => 898,
        'first_name' => 'Bomkesh',
        'last_name' => 'Patel',
    ),
);

$last_names = array_column($userDetails, 'last_name');
print_r($last_names); // Array ( [0] => Bharti [1] => Mishra [2] => Patel )

echo "<br>";

$first_names = array_column($userDetails, 'first_name', 'id');
print_r($first_names); // Array ( [27] => Soham [6761] => Anant [898] => Bomkesh )

echo "<br>";

$first_names = array_column($userDetails, 'first_name', 'last_name');
print_r($first_names); // Array ( [Bharti] => Soham [Mishra] => Anant [Patel] => Bomkesh )
