<?php

// setcookie('soham_ki_cookie', 'soham ke cookie ki value ki jai', ((86400)/10), '/');
// print_r($_COOKIE);

$cookie_name = "user1";
$cookie_value = "val1";
setcookie($cookie_name, $cookie_value, time() + 10, '/');
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai [user1] => val2 )
echo "<br>";

$cookie_value = "val2";
setcookie($cookie_name, $cookie_value, time() + 20, '/');
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai [user1] => val2 )


$cookie_name = "user22";
$cookie_value = "val22";
setcookie($cookie_name, $cookie_value, time() + 30, '/');
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai [user1] => val2 )
echo "<br>";
$cookie_name = "user33";
$cookie_value = "val33";
setcookie($cookie_name, $cookie_value, time() + 40, '/');
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai [user1] => val2 )
echo "<br>";
$cookie_name = "user44";
$cookie_value = "val44";
setcookie($cookie_name, $cookie_value, time() + 50, '/');
print_r($_COOKIE); // Array ( [soham_ki_cookie] => soham ke cookie ki value ki jai [user1] => val2 )
echo "<br>";
