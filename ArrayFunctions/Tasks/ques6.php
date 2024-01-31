<?php


/* Q6. $student = array (

    array(
        'firstname' => 'john',
        'lastname'=> "deo",
        'mark' =>
        array(
        'english' => 100,
        'gujrati' => 220,
        'hindi' => 30
        )
        ),

        array(
        'firstname' => 'David',
        'lastname'=> "Miller",
        'mark' =>
        array(
        'english' => 120,
        'gujrati' => 310,
        'hindi' => 20
        )
        ),

        array(
        'firstname' => 'Thomas',
        'lastname'=> "wilson",
        'mark' =>
        array(
        'english' => 200,
        'gujrati' => 110,
        'hindi' => 70
        )
        ),


        array(
        'firstname' => 'James',
        'lastname'=> "Brown",
        'mark' =>
        array(
        'english' => 240,
        'gujrati' => 310,
        'hindi' => 10
        )
)
);

(i) Short the array marks column to descending order
(ii) Short the Array according to there total of marks column
*/
$student = array(

    array(
        'firstname' => 'john',
        'lastname' => "deo",
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
        'mark' =>
        array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
        )
    )
);

// (i) Short the array marks column to descending order
$desiredCol = array_column($student, 'mark', 'firstname');
// print_r($desiredCol);

$totalMarks = [];

foreach ($desiredCol as $name => $y) {
    echo "$name's Marks = ";
    arsort($y);
    print_r($y);
    echo "<br>";

    $totalMarks[$name] = array_sum(array_values($y));
}


// (ii) Short the Array according to there total of marks column
echo "<br>";

asort($totalMarks);
print_r($totalMarks);

function fun($a, $b)
{

    if (array_sum(array_values($a['mark'])) == array_sum(array_values($b['mark']))) return 0;
    return (array_sum(array_values($a['mark'])) < array_sum(array_values($b['mark']))) ? -1 : 1;
}

uasort($student, "fun");
echo "<br>";
print_r($student);
