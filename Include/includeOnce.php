<?php

include_once 'xyz.php';
echo $name;

include_once 'xyz.php'; // this is of no use
echo $number;

// include_once 'xyz.php' gives warning as many times as it is called if file is not found

/*
Warning: include_once(xyz.php): Failed to open stream: No such file or directory in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 3

Warning: include_once(): Failed opening 'xyz.php' for inclusion (include_path='D:\Software\XAMPP\php\PEAR') in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 3

Warning: Undefined variable $name in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 4

Warning: include_once(xyz.php): Failed to open stream: No such file or directory in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 6

Warning: include_once(): Failed opening 'xyz.php' for inclusion (include_path='D:\Software\XAMPP\php\PEAR') in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 6

Warning: Undefined variable $number in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 7
*/



require_once 'xyz.php';
echo $name;

require_once 'xyz.php'; // this is of no use
echo $number;

// require_once 'xyz.php' gives a warning for one time only and it terminates the script

// Warning: require_once(xyz.php): Failed to open stream: No such file or directory in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 9

// Fatal error: Uncaught Error: Failed opening required 'xyz.php' (include_path='D:\Software\XAMPP\php\PEAR') in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php:9 Stack trace: #0 {main} thrown in D:\Software\XAMPP\htdocs\PHP\Include\includeOnce.php on line 9