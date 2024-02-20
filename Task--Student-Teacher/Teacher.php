<?php
require './Traits/showStudentMarks.php';
$studentDetails = [
    '65d48892162fa' => array('name' => 'SOHAM BHARTI', 'mob' => 8987675654, 'age' => 22, 'email' => 'soham.silversky@gmail.com'),
];
$studentMarks = [
    '65d48892162fa' => array('maths' => 92, 'english' => 83, 'hindi' => 88),
];

class Teacher
{
    use commonFunctions;
    private $name;
    private $mob;
    private $age;
    private $email;
    private $id;
    function enrollStudent($name, $mob, $age, $email)
    {
        global $studentDetails;
        $this->name = $name;
        $this->mob = $mob;
        $this->age = $age;
        $this->email = $email;
        $this->id = uniqid("");
        $newStudent = array('name' => $this->name, 'mob' => $this->mob, 'age' => $this->age, 'email' => $this->email);
        $studentDetails[$this->id] = $newStudent;
    }

    function showStudentsDetails()
    {
        global $studentDetails;
        print_r($studentDetails);
    }

    function showStudentsMarks()
    {
        global $studentMarks;
        print_r($studentMarks);
    }

    function addMarks($roll, $mathsMarks, $englishMarks, $hindiMarks)
    {
        global $studentMarks, $studentDetails;
        if (array_key_exists($roll, $studentDetails)) {
            $marksArray = array('maths' => $mathsMarks, 'english' => $englishMarks, 'hindi' => $hindiMarks);
            $studentMarks[$roll] = $marksArray;
        } else echo "Student not found!";
    }

}
