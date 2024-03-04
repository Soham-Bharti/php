<?php
require './Teacher.php';
$teacherObj = new Teacher();
$teacherObj->enrollStudent('Amaresh', 41649865, 44, 'amaresh@gmail.com');
$teacherObj->showStudentsDetails();
echo "<br>";
$teacherObj->showStudentDetails('65d48892162fa');
echo "<br>";
$teacherObj->showStudentMarks('65d48892162fa');
echo "<br>";
$teacherObj->showStudentsMarks();