<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Types in PHP</h1>

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

    /*


    // 1. String --> can be '...' or "..."
    $a = 'Hello World<br>';
    $b = "Backend is love!<br>";

    // echo $a . $b;







    // 2. integer --> Range fromm -2^31 to 2^31 == -2,147,483,648 to 2,147,483,647.
    $a = 0;
    echo var_dump($a) . "<br>"; // int(0)

    // Integers can be specified in: decimal (base 10), hexadecimal (base 16), octal (base 8), or binary (base 2) notation

    // i) decimal (base 10)
    $a = 10;
    echo "Val is " . $a . " and type is " . var_dump($a) . "<br>";


    // ii) hexadecimal (base 16)
    $a = 0x10;
    echo "Val is " . $a . " and type is " . var_dump($a) . "<br>";

    // iii) octal (base 8)
    $a = 042;
    echo "Val is " . $a . " and type is " . var_dump($a) . "<br>";

    // iv) binary (base 2)
    $a = 0b101010;
    echo "Val is " . $a . " and type is " . var_dump($a) . "<br>";








    // 3. Float
    $a = 1.234; // decimal notation
    $b = 1.2e3; // exponential notation
    $c = 7E-10; // exponential notation










    // 4. Boolean --> TRUE or FALSE
    $x = true;
    var_dump($x);
    $y = true;
    var_dump($y);









    // 5. Array
    $a = [1, 2, 3, 4, 5];
    echo $a[0];
    echo "<br>" . $a[1];
    // echo $a[-1]; // undefined array key
    
    $a[-1] = 0; // explicitly defined array key
    // echo $a; // Warning: Array to string conversion 
    var_dump($a); // array(6) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) [-1]=> int(0) }
    
    echo "<br>" . sizeof($a) . "<br>"; // 6
    echo $a[sizeof($a) - 4]; // 3  
    
    $a = array(1,2,3);
    var_dump($a); // array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) }
    
    
    






    
    // 6. Object
    // Classes and objects are the two main aspects of object-oriented programming.
    
    // A class is a template for objects, and an object is an instance of a class.
    
    // When the individual objects are created, they inherit all the properties and behaviors from the class, but each object will have different values for the properties.
    
    // Let's assume we have a class named Car that can have properties like model, color, etc. We can define variables like $model, $color, and so on, to hold the values of these properties.
    
    // When the individual objects (Volvo, BMW, Toyota, etc.) are created, they inherit all the properties and behaviors from the class, but each object will have different values for the properties.
    
    // If you create a __construct() function, PHP will automatically call this function when you create an object from a class.


  
    class Student
    {
        public $name;
        public $age;
        public $roll;
        public function __construct($name, $age, $roll)
        {
            $this->name = $name;
            $this->age = $age;
            $this->roll = $roll;
        }
        
        public function display()
        {
            echo $this->name . "<br>";
            echo $this->age . "<br>";
            echo $this->roll . "<br>";
        }
    }
    
    // creating objects of Student class
    $s1 = new Student("Ram", 21, 1);
    $s2 = new Student("Shyam", 20, 2);
    $s3 = new Student("Ravi", 22, 3);
    var_dump($s1); // object(Student)#1 (3) { ["name"]=> string(3) "Ram" ["age"]=> int(21) ["roll"]=> int(1) }
    echo "<br>" . gettype($s1) . "<br>"; // object
    // echo $s1; // Fatal error: Uncaught Error: Object of class Student could not be converted to string
    
    
    // calling display function
    $s1->display();
    $s2->display();
    $s3->display();




    
    
    
    
    
    // 7. Null
    // Null is a special data type which can have only one value: NULL.
    
    // A variable of data type NULL is a variable that has no value assigned to it.
    
    // Tip: If a variable is created without a value, it is automatically assigned a value of NULL.
    
    // Variables can also be emptied by setting the value to NULL
    
    $x = null;
    var_dump($x); // NULL
    
    
    
    
    


    
    
    // 8. Resource
    // The special resource type is not an actual data type. It is the storing of a reference to functions and resources external to PHP.
    
    // A common example of using the resource data type is a database call.
    
    */


    // Change Data Type
    $x = 5;
    var_dump($x); // int(5)
    echo '<br>';

    $x = "Hello";
    var_dump($x); // string(5) "Hello"
    echo '<br>';

    // If you want to change the data type of an existing variable, but not by changing the value, you can use casting.
    $x = 5;
    $x = (string) $x; // string(1) "5"
    var_dump($x);

    ?>
</body>

</html>