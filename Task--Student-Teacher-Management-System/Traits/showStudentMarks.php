<?php
trait showStudentMarks{
    function showStudentMarks($roll)
    {
        global $studentMarks, $studentDetails;
        if (array_key_exists($roll, $studentMarks)) {
            echo "<br>Printing " . $studentDetails[$roll]['name'] . "'s marks:<br>";
            print_r($studentMarks[$roll]);
        } else echo "Student not found!";
    }
}