<?php
trait commonFunctions{
    function showStudentMarks($roll)
    {
        global $studentMarks, $studentDetails;
        if (array_key_exists($roll, $studentMarks)) {
            echo "<br>Printing " . $studentDetails[$roll]['name'] . "'s marks:<br>";
            print_r($studentMarks[$roll]);
        } else echo "Student not found!";
    }
    function showStudentDetails($roll)
    {
        global $studentDetails;
        if (array_key_exists($roll, $studentDetails)) {
            echo "Printing " . $studentDetails[$roll]['name'] . "'s details:<br>";
            print_r($studentDetails[$roll]);
        } else echo "Student not found!";
    }
}