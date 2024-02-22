<?php


// RegEx Practice

/* 
Regular Expression	        Will match…
________________________________________________________
foo	                        The string “foo”
^foo	                    “foo” at the start of a string
foo$	                    “foo” at the end of a string
^foo$                       “foo” when it is alone on a string
[abc]	                    a, b, or c
[a-z]	                    Any lowercase letter
[^A-Z]	                    Any character that is not a uppercase letter
(gif|jpg)	                Matches either “gif” or “jpg”
[a-z]+	                    One or more lowercase letters
[0-9.-]	                    Any number, dot, or minus sign
^[a-zA-Z0-9_]{1,}$	        Any word of at least one letter, number or _
([wx])([yz])	            wy, wz, xy, or xz
[^A-Za-z0-9]	            Any symbol (not a number or a letter)
([A-Z]{3}|[0-9]{4})	        Matches three letters or four numbers

*/


$input = "This is @our 70th statement! - Have a #good day...";
$pattern = '/our/';

// print_r(preg_match_all($pattern, $input)); // 1

print_r(preg_filter($pattern, '===', $input)); // This is @=== 70th statement! - Have a #good day...
echo "<br>";

$pattern = '/^T/';
print_r(preg_filter($pattern, '===', $input)); // ===his is @our 70th statement! - Have a #good day...
echo "<br>";

$pattern = '/.$/';
print_r(preg_filter($pattern, '===', $input)); // This is @our 70th statement! - Have a #good day..===
echo "<br>";

$pattern = '/[a-z]/';
print_r(preg_filter($pattern, '===', $input)); // T========= ====== @========= 70====== ===========================! - H========= === #============ =========...
echo "<br>";

$pattern = '/[A-Z]/';
print_r(preg_filter($pattern, '===', $input)); // ===his is @our 70th statement! - ===ave a #good day...
echo "<br>";

$pattern = '/[^A-Z]/';
print_r(preg_filter($pattern, '*', $input)); // T******************************H******************
echo "<br>";

$pattern = '/[@|#]/';
print_r(preg_filter($pattern, '*', $input)); // This is *our 70th statement! - Have a *good day...
echo "<br>";

$pattern = '/[@#]/';
print_r(preg_filter($pattern, '*', $input)); // This is *our 70th statement! - Have a *good day...
echo "<br>";

$pattern = '/[a-z]/';
print_r(preg_filter($pattern, '*', $input)); // T*** ** @*** 70** *********! - H*** * #**** ***...
echo "<br>";

$pattern = '/[a-z]+/';
print_r(preg_filter($pattern, '*', $input)); // T* * @* 70* *! - H* * #* *...
echo "<br>";

$pattern = '/[a-z]*/';
print_r(preg_filter($pattern, '*', $input)); // *T** ** *@** *7*0** **!* *-* *H** ** *#** **.*.*.*
echo "<br>";

$pattern = '/[0-9.-]/';
print_r(preg_filter($pattern, '*', $input)); // This is @our **th statement! * Have a #good day***
echo "<br>";

$pattern = '/[o]{2}+/';
print_r(preg_filter($pattern, '*', $input)); // This is @our 70th statement! - Have a #g*d day...
echo "<br>";

$input = "banana papaya";
$pattern = '/(na)/';
print_r(preg_filter($pattern, '*', $input)); // ba** papaya
echo "<br>";

$input = "banana papaya";
$pattern = '/(na)|(pa)/';
print_r(preg_filter($pattern, '*', $input)); // ba** **ya
echo "<br>";

$input = "This is @our 70th statement! - Have a #good day...";
$pattern = '/[^A-Za-z0-9]/';
print_r(preg_filter($pattern, '*', $input)); // This*is**our*70th*statement****Have*a**good*day***
echo "<br>";

$input = "This is @our 70th statement! - Have a #good day...";
$pattern = '/[^A-Za-z0-9 ]/';
print_r(preg_filter($pattern, '/', $input)); // This is /our 70th statement/ / Have a /good day///
echo "<br>";
