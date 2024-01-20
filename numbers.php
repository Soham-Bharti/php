<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>PHP Numbers</h2>

    <?php
    /*
    There are three main numeric types in PHP:
    1. Integer
    2. Float
    3. Number Strings

    In addition, PHP has two more data types used for numbers:
    4. Infinity
    5. NaN
    */

    // PHP Integers
    // An integer data type is a non-decimal number between -2147483648 and 2147483647 in 32 bit systems, and between -9223372036854775808 and 9223372036854775807 in 64 bit systems. A value greater (or lower) than this, will be stored as float, because it exceeds the limit of an integer.

    $x = 9223372036854775807; // int(9223372036854775807)
    var_dump($x);

    $x = 9223372036854775808; // float(9.223372036854776E+18)
    var_dump($x);
    echo is_finite($y);


    // PHP has the following predefined constants for integers:
    //     PHP_INT_MAX - The largest integer supported - 9223372036854775807
    //     PHP_INT_MIN - The smallest integer supported
    //     PHP_INT_SIZE -  The size of an integer in bytes

    // PHP has the following functions to check if the type of a variable is integer:
    //     is_int()
    //     is_integer() - alias of is_int()
    //     is_long() - alias of is_int()


    // $x = PHP_INT_SIZE;
    // echo var_dump(is_int($x));
    echo "<br>";
    echo PHP_FLOAT_EPSILON;
    $y=11;





    ?>


</body>
</html>