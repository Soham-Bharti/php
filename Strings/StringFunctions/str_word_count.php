<?php

// PHP str_word_count() Function
// The str_word_count() function counts the number of words in a string.

// Syntax
// str_word_count(string,return,char)

echo str_word_count("Hello world!") . "<br>"; // 2

// 1 - Returns an array with the words from the string
print_r(str_word_count("Hello world!", 1)); // Array ( [0] => Hello [1] => world )
echo "<br>";

// 0 - Default. Returns the number of words found
print_r(str_word_count("Hello world!", 0)); // 2
echo "<br>";

// 2 - Returns an array where the key is the position of the word in the string, and value is the actual word
print_r(str_word_count("Hello world!", 2)); // Array ( [0] => Hello [6] => world )
echo "<br>";

echo str_word_count("Hello_world!") . "<br>"; // 2
echo str_word_count("Hello_world! 7 0") . "<br>"; // 2
echo str_word_count("Hello_world! 8") . "<br>"; // 2
echo str_word_count("Hello_world by Soham") . "<br>"; // 4
echo str_word_count("Hello world by Soham") . "<br>"; // 4
echo str_word_count("Helloworld by Soham") . "<br>"; // 3
echo str_word_count("Hello-world by Soham") . "<br>"; // 3
echo str_word_count("_Hello_world by Soham") . "<br>"; // 4
echo str_word_count("_Hello-world by Soham") . "<br>"; // 3



echo 'Trying to consider char as words... <br>';
// char	Optional. Specifies special characters to be considered as words.
print_r(str_word_count("Hello_world!", 0)); // 2
echo "<br>";

print_r(str_word_count("Hello_world!", 0, '_')); // 1
echo "<br>";

print_r(str_word_count("8 Hello_world! 9", 0, "89")); // 4
echo "<br>";

print_r(str_word_count("8 Hello_world! 9", 1, "89")); // Array ( [0] => 8 [1] => Hello [2] => world [3] => 9 )
echo "<br>";

print_r(str_word_count("8 Hello_world! 89", 1, '89')); // Array ( [0] => 8 [1] => Hello [2] => world [3] => 89 )
