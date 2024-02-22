<?php

// r ->	Open a file for read only. File pointer starts at the beginning of the file

$myFile = fopen('dictionary.txt', 'r') or die("Can't open file 'dictionary.txt");
echo fread($myFile, filesize('dictionary.txt'));
fclose($myFile);

// Output 
// AJAX = Asynchronous JavaScript and XML CSS = Cascading Style Sheets HTML = Hyper Text Markup Language PHP = PHP Hypertext Preprocessor SQL = Structured Query Language SVG = Scalable Vector Graphics XML = EXtensible Markup Language

echo "<br>";

$myJavaFile = fopen('Main.java', 'r') or die("Could not open Java file");
echo fread($myJavaFile, filesize('Main.java'));
fclose($myJavaFile);

// Output
// class Main { public static void main(String[] args) { int first = 10; int second = 20; // add two numbers int sum = first + second; System.out.println(first + " + " + second + " = " + sum); } }
