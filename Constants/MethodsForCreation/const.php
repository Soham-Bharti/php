<?php


// PHP const Keyword
// Method 2 
const MYCAR = "Volvo";
echo MYCAR . "<br>"; // Volvo


// Constants are automatically global and can be used across the entire script.

define("GREETING", "Welcome to Google.com!");

function myTest()
{
    echo GREETING;
}

myTest();
