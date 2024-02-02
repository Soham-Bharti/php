<?php

// array_search()
// The array_search() function search an array for a value and returns the key.

// Syntax
// array_search(value, array, strict)
// strict	Optional. If this parameter is set to TRUE, then this function will search for identical elements in the array. Possible values:
//     true
//     false - Default


$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_search("red", $a); // a

echo "<br>";


// strict -> true

$a = array("a" => "5", "b" => 5, "c" => "5");
echo array_search(5, $a, true); // b

echo "<br>";


echo array_search(3, [0, 1, 2, 3, 4]); // 3
echo "<br>";

$userDetails = array('soham' => array('id' => 1, 'amount' => 28999,), 'amaresh' => array('id' => 2, 'amount' => 786679,), 'monu' => array('id' => 3, 'amount' => 90987));


var_dump(array_search(2, $userDetails)); // bool(false)
echo "<br>";

echo (array_search(2, array_column($userDetails, 'id'))); // 1
echo "<br>";
echo (array_search(3, array_column($userDetails, 'id'))); // 2
echo "<br>";

$student = array(

    array(
        'firstname' => 'john',
        'lastname' => "deo",
        'city' => 'Delhi',
        'mark' =>
        array(
            'english' => 100,
            'gujrati' => 220,
            'hindi' => 30
        )
    ),

    array(
        'firstname' => 'David',
        'lastname' => "Miller",
        'city' => 'Bihar',
        'mark' =>
        array(
            'english' => 120,
            'gujrati' => 310,
            'hindi' => 20
        )
    ),

    array(
        'firstname' => 'Thomas',
        'lastname' => "wilson",
        'city' => 'Bhopal',
        'mark' =>
        array(
            'english' => 200,
            'gujrati' => 110,
            'hindi' => 70
        )
    ),


    array(
        'firstname' => 'James',
        'lastname' => "Brown",
        'city' => 'Bhopal',
        'mark' =>
        array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
        )
    ),
    array(
        'firstname' => 'Soham',
        'lastname' => "Bharti",
        'city' => 'Bihar',
        'mark' =>
        array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
        )
    ),
    array(
        'firstname' => 'Amaresh',
        'lastname' => "Sharma",
        'city' => 'Bihar',
        'mark' =>
        array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
        )
    ),
    array(
        'firstname' => 'Shilpa',
        'lastname' => "Arora",
        'city' => 'Bhopal',
        'mark' =>
        array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
        )
    ),
);

// array_search() in 2D Array
var_dump(array_search('Bhopal', array_column($student, 'city'))); // int(2)
echo "<br>";
var_dump(array_search('Bhopal', array_column($student, 'city', 'firstname'))); // string(6) "Thomas"
echo "<br>";


// array_search() in 3D Array 
var_dump(array_search(10, array_column($student, 'mark'))); // bool(false)
echo "<br>";

// var_dump(array_search( 310, array_column($student[6]['mark'], 'gujrati'))); // bool(false)

var_dump(array_search(10, $student[6]['mark']));
