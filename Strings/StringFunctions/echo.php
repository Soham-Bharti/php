<?php


// PHP echo() Function
// 	Outputs one or more strings

// Sysntax
// echo(strings)

echo "Hello world!";

// PHP echo() Function
// Note: The echo() function is not actually a function, so you are not required to use parentheses with it. However, if you want to pass more than one parameter to echo(), using parentheses will generate a parse error.

$str = "Hello world!";
echo $str;
echo "<br>What a nice day!";

$str1="Hello world!";
$str2="What a nice day!";
echo $str1 . " " . $str2;

$age=array("Peter"=>"35");
echo "Peter is " . $age['Peter'] . " years old.";

echo "This text
spans multiple
lines.";


// echo ('This ','string ','was ','made ','with multiple parameters.'); // Parse error: syntax error, unexpected token "," 
echo 'This ','string ','was ','made ','with multiple parameters.';

$color = "red";
echo "Roses are $color";
echo "<br>";
echo 'Roses are $color';



$color = "red";
?>
 
<p>Roses are <?=$color?></p>
