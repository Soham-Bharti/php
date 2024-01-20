<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*
    echo "Studying variables in php...";

    // PHP is Loosely Typed Language it decides variable type by it's own

    // variables can be overridden
    $car = "BMW";
    echo "<br>I love " . $car; // concatinnation

    $car = "Toyota";
    echo "<br>I ride " . $car . " also!<br>";

    // assigning multiple values
    $x = $y = $z = "Fruit";

    // $car = null;
    // echo $car;


    // to get the type and value
    var_dump($car);
    echo "<br>";
    var_dump([10,20,30]);

    // to get only the type
    echo "<br>".gettype($car)."<br>";


    // Types
    /*
        1. String
        2. Integer
        3. Float (double)
        4. Boolean
        5. Array
        6. Object
        7. Null
        8. Resource
    */

    echo "Studying variables scope in php...<br>";
    /*
    1. Local -> variables that are declared within the function and are accessible only inside the function
    2. Global -> variables that are declared outside the function and are accessible only outside the function
    3. Static -> local variables that are accessible/functional outside the function also using static keyword
    */

    function test()
    {
        $x = 10;
        $x++;
        echo $x . "<br>";
    }
    test(); // 11
    test(); // 11
    test(); // 11
    test(); // 11

    // using static keyword
    function test2()
    {
        static $x = 10;
        $x++;
        echo $x . "<br>";
    }
    test2(); // 11
    test2(); // 12
    test2(); // 13
    test2(); // 14

    // Global keyword -> variables that are declared outside the function can be accessed using the "$GLOBALS[index]", where 'index' is the name of the variable

    $a = 10;
    $b = 20;

    function fun()
    {
        // echo $a+$b; throughs error
        echo $GLOBALS["a"] + $GLOBALS['b']; // only $GLOBALS['name-of-variable'] can be used
    }
    fun();

    ?>
</body>

</html>