<?php

// PHP Exception Object -> 	The constructor of the Exception object
// Exceptions are used by functions and methods to send information about errors and unexpected behaviour.

// The Exception object has no public properties, but it has private and protected properties which can be written to or read from using the constructor and methods.

// Syntax
// new Exception(message, code, previous)

function divide($dividend, $divisor)
{
    if ($divisor == 0) throw new Exception("division by zero");
    return $dividend / $divisor;
}

try {
    echo divide(5, 0);
} catch (Exception $e) {
    print_r($e); // Exception Object ( [message:protected] => division by zero [string:Exception:private] => [code:protected] => 0 [file:protected] => D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php [line:protected] => 12 [trace:Exception:private] => Array ( [0] => Array ( [file] => D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php [line] => 17 [function] => divide [args] => Array ( [0] => 5 [1] => 0 ) ) ) [previous:Exception:private] => )
    echo "<br>";
    echo "Error code: " . $e->getCode(); // 0
}
function divide1($dividend, $divisor)
{
    if ($divisor == 0) throw new Exception("division by zero", 1);
    return $dividend / $divisor;
}

echo "<br> Only added the 2nd param to Exception and it's protected now.<br>";

try {
    echo divide1(5, 0);
} catch (Exception $e) {
    print_r($e); // Exception Object ( [message:protected] => division by zero [string:Exception:private] => [code:protected] => 1 [file:protected] => D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php [line:protected] => 24 [trace:Exception:private] => Array ( [0] => Array ( [file] => D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php [line] => 31 [function] => divide1 [args] => Array ( [0] => 5 [1] => 0 ) ) ) [previous:Exception:private] => )

    echo "<br>";

    echo "Error code: " . $e->getCode(); // 1
    echo "<br>";
    $code = $e->getCode();
    $message = $e->getMessage();
    $file = $e->getFile();
    $line = $e->getLine();
    echo "Exception thrown in $file on line $line: [Code $code] $message";
    // Exception thrown in D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php on line 26: [Code 1] division by zero


    echo "<br><h3>PHP Exception getTrace() Method -> Stack traces contain information about all of the functions that are running at a given moment. The stack trace provided by this method has information about the stack at the time that the exception was thrown.

    </h3><br>";
    print_r($e->getTrace()); // Array ( [0] => Array ( [file] => D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php [line] => 33 [function] => divide1 [args] => Array ( [0] => 5 [1] => 0 ) ) )


    echo "<br><h3>PHP Exception getTraceAsString() Method</h3><br>";
    echo ($e->getTraceAsString()); // #0 D:\Software\XAMPP\htdocs\PHP\Exceptions\Functions\Exception.php(33): divide1(5, 0) #1 {main}
}
