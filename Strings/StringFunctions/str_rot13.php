<?php

// PHP str_rot13() Function
// Performs the ROT13 encoding on a string

// Syntax
// str_rot13(string)

/*
The str_rot13() function performs the ROT13 encoding on a string.

The ROT13 encoding shifts every letter 13 places in the alphabet. Numeric and non-alphabetical characters remains untouched.

Tip: Encoding and decoding are done by the same function. If you pass an encoded string as argument, the original string will be returned.
*/

$password = "Pass@1234";
// encoding
$encodedPass = str_rot13($password);

echo "Password is: $password & Encoded Password is: $encodedPass <br>"; // Password is: Pass@1234 & Encoded Password is: Cnff@1234


// decoding
$decodedPass = str_rot13($encodedPass);
echo "Encoded Password is: $encodedPass & Decoded Password is: $decodedPass <br>"; // Encoded Password is: Cnff@1234 & Decoded Password is: Pass@1234

if ($decodedPass == $password) {
    echo "Password Matches";
}
