<?php

declare(strict_types=1); // strict requirement

// PHP User Defined Functions
// A function is a block of statements that can be used repeatedly in a program.
// A function will not execute automatically when a page loads.
// A function will be executed by a call to the function.

// create a function
function greet()
{
    echo "Happy 75th Republic Day!";
}


// call a function
greet();


echo "<br>";

// argument based function
function setHeight($minheight = 50)
{
    echo "The height is : $minheight <br>";
}

setHeight(350);
setHeight(); // will use the default value of 50
setHeight(135);
setHeight(80);

// The height is : 350
// The height is : 50
// The height is : 135
// The height is : 80

echo "<br>";



// PHP Functions - Returning values
function sum($x, $y)
{
    $z = $x + $y;
    return $z;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4) . "<br>";

// 5 + 10 = 15
// 7 + 13 = 20
// 2 + 4 = 6


// Passing Arguments by Reference
function add_five(&$value)
{
    $value += 5;
}

$num = 2;
add_five($num);
echo $num; // 7

echo "<br>";

// Variable Number of Arguments
// By using the **** ... operator **** in front of the function parameter, the function accepts an unknown number of arguments. This is also called a *** variadic *** function.

// The variadic function argument becomes an array.


function mySum(...$x)
{
    $result = 0;
    for ($i = 0; $i < count($x); $i++) {
        $result += $x[$i];
    }
    return $result;
}

// error
// $arr = array(1, 2, 3);
// mySum($arr);

echo mySum(1, 2, 3) . "<br>"; // 6
echo mySum(1, 2, 3, 4) . "<br>"; // 10



// You can only have one argument with variable length, and it has to be the last argument.
// The variadic argument must be the last argument:

function myFamily($lastname, ...$firstname)
{
    $txt = "";
    $len = count($firstname);
    for ($i = 0; $i < $len; $i++) {
        $txt = $txt . "Hi, $firstname[$i] $lastname.<br>";
    }
    return $txt;
}

$a = myFamily("Doe", "Jane", "John", "Joey");
// $a = myFamily(["Doe", "Jane", "John", "Joey"]); // nothing printed
echo $a;


// If the variadic argument is not the last argument, you will get an error.
// Having the ... operator on the first of two arguments, will raise an error:


// function myFamily2(...$firstname, $lastname)  // Error: Only the last parameter can be variadic
// {
//     $txt = "";
//     $len = count($firstname);
//     for ($i = 0; $i < $len; $i++) {
//         $txt = $txt . "Hi, $firstname[$i] $lastname.<br>";
//     }
//     return $txt;
// }

// $a = myFamily2("Doe", "Jane", "John", "Joey");
// echo $a;



// trying ... with arrays

function print_array(...$x)
{

    $n = count($x);

    for ($i = 0; $i < $n; $i++) {
        $len = count($x[$i]);
        for ($j = 0; $j < $len; $j++) {
            echo $x[$i][$j] . " ";
        }
        echo "Done...<br>";
    }
}
print_array([1, 2, 3, 4, 6, 7, 8, 8, 9, "soham", 2, 3], [4, 5, 6], [7, 8, 9]);

echo "<br>";

// PHP is a Loosely Typed Language
function addNumbers(int $a, int $b)
{
    return $a + $b;
}
// echo addNumbers(5, "5 days");

// after adding declare(strict_types=1)
// echo addNumbers(5, "5 days"); // Fatal error: Uncaught TypeError: addNumbers(): Argument #2 ($b) must be of type int, string given, called in


// since strict is NOT enabled "5 days" is changed to int(5), and it will return 10


//   To specify strict we need to set declare(strict_types=1);. This must be on the very first line of the PHP file.
echo addNumbers(5, 5); // 10

// The strict declaration forces things to be used in the intended way.



// PHP Return Type Declarations
// PHP 7 also supports Type Declarations for the return statement. Like with the type declaration for function arguments, by enabling the strict requirement, it will throw a "Fatal Error" on a type mismatch.

// To declare a type for the function return, add a colon ( : ) and the type right before the opening curly ( { )bracket when declaring the function.

// In the following example we specify the return type for the function:
echo '<br> Return type declaration...<br>';
function add_Numbers(float $a, float $b): float
{
    return $a + $b;
}
echo add_Numbers(1.2, 5.2); // 6.4

echo "<br>";

function add_Numbers2(float $a, float $b): int
{
    return (int)($a + $b);
}
echo add_Numbers2(1.2, 5.2); // 6
