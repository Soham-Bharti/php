<?php
         /*
        Data Types in PHP
        1. String
        2. Integer
        3. Float/Double
        4. Null
        5. Resource
        6. Boolean
        7. Array
        8. Object
        */

// get data type and value

$firstName = "Soham";
$lastName = "Bharti";
var_dump($firstName);
echo "<br>";
var_dump($lastName);
echo "<br>";

$age = 10;
var_dump($age);
echo "<br>";

$floatValue = 2.90;
var_dump($floatValue);
echo "<br>";

$isEligible = false;
var_dump($isEligible);
echo "<br>";

$students = ["0191CS201001" => "Aakash", "01911CS201167" => "Shyam Parmar", "0191CS201183" => "Vikalp"];
var_dump($students);
echo "<br>";

// PHP Object
class Employee{
    public $name;
    public $age;
    public $salary;
    public function __construct($name, $age, $salary){
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

$emp1 = new Employee("Aakash", 21, 10000);
echo $emp1->name . "<br>";
$emp2 = new Employee("Soham", 22, 20000);
echo $emp2->name . "<br>";

// NULL
$a;
echo $a . "<br>"; // Warning: Undefined variable $a in C:\xampp\htdocs\first-php\DataTypes\question.php on line 58

$a = NULL;
echo $a; // Empty output
var_dump($a);
echo "<br>";

// changing data type
$num = "50";
$intNum = (int)$num;
echo $intNum. "<br>"; // 50
var_dump($intNum);