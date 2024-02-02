<?php

// 1. find the username from the given email using pure string function. 
// ex : anant@gmail.com => answer : anant

$email = 'anant@gmail.com';


echo strchr($email, '@', true) . "<br>";

$pos = strpos($email, '@');
// echo "$pos <br>";
$userName = substr($email, 0, $pos);
echo $userName;
