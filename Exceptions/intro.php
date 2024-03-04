<?php

// PHP Exceptions
// An exception is an object that describes an error or unexpected behaviour of a PHP script.
// Exceptions are thrown by many PHP functions and classes.
// User defined functions and classes can also throw exceptions.
// Exceptions are a good way to stop a function when it comes across data that it cannot use.


// Throwing an Exception
// The throw statement allows a user defined function or method to throw an exception. When an exception is thrown, the code following it will not be executed.

// If an exception is not caught, a fatal error will occur with an "Uncaught Exception" message.


/* 
function divide($dividend, $divisor)
{
    if($divisor == 0) throw new Exception('Divided by zero not possible');
    return $dividend / $divisor;
}
echo divide(5, 0);
*/
// Before exception handling
// Fatal error: Uncaught DivisionByZeroError: Division by zero

// After exception handling
// Fatal error: Uncaught Exception: Divided by zero not possible 

// function divide($dividend, $divisor)
// {
//     if ($divisor == 0) {
//         throw new Exception("Division by zero");
//     }
//     return $dividend / $divisor;
// }

// try {
//     echo divide(5, 0);
// } catch (Exception $e) {
//     echo "Unable to divide. $e";
// }
// Unable to divide. Exception: Division by zero in...


function divide2($dividend, $divisor)
{
    if ($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    echo divide2(5, 0);
} catch (Exception $e) {
    echo "Unable to divide. $e";
} finally {
    echo "Process complete.";
}
// Unable to divide. Exception: Division by zero in D:\Software\XAMPP\htdocs\PHP\Exceptions\intro.php:50 Stack trace: #0 D:\Software\XAMPP\htdocs\PHP\Exceptions\intro.php(56): divide2(5, 0) #1 {main}Process complete.


// function divide($dividend, $divisor)
// {
//     if ($divisor == 0) {
//         throw new Exception("Division by zero");
//     }
//     return $dividend / $divisor;
// }

// try {
//     echo divide(5, 0);
// } finally {
//     echo 'Process complete.';
// }
// Process complete.
// Fatal error: Uncaught Exception: Division by zero 