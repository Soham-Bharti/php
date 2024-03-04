<?php

$names = array('aman', 'rohit', 'dhoni', 'soham');

echo in_array('soham', $names); // 1 (true)

echo "<br>";

echo array_search('soham', $names); // 3

echo "<br>";

$a = array(array('p', 'h'), 'a', 'b', array('l', 'j'));

echo in_array('j', $a); //  (false)

echo "<br>";

echo in_array(array('l', 'j'), $a); // 1 (true)

echo "<br>";
