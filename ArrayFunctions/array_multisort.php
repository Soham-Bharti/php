<?php

// array_multisort()
// The array_multisort() function returns a sorted array. You can assign one or more arrays. The function sorts the first array, and the other arrays follow, then, if two or more values are the same, it sorts the next array, and so on.

// Note: String keys will be maintained, but numeric keys will be re-indexed, starting at 0 and increase by 1.

// Note: You can assign the sortorder and the sorttype parameters after each array. If not specified, each array parameter uses the default values.


// **********The first array gets sorted and the rest of array gets sorted based on the previous position of the first array respectively see all examples carefully***************


// Syntax
// array_multisort(array1, sortorder, sorttype, array2, array3, ...)


$a = array("Dog", "Cat", "Horse", "Bear", "Zebra");
array_multisort($a);
print_r($a); // Array ( [0] => Bear [1] => Cat [2] => Dog [3] => Horse [4] => Zebra )

echo "<br>";

// **********The first array gets sorted and the rest of array gets sorted based on the previous position of the first array respectively see all examples carefully***************

$a1 = array("Dog", "Cat");
$a2 = array("Fido", "Missy");
array_multisort($a1, $a2);
print_r($a1); // Array ( [0] => Cat [1] => Dog )
echo "<br>";
print_r($a2); // Array ( [0] => Missy [1] => Fido )
echo "<br>";


// Trying sort order... -> SORT_DESC
$a1 = array("Dog", "Cat", "Horse", "Mouse");
$a2 = array("Fido", "Missy", "Cat", "Horse");
array_multisort($a1, SORT_DESC, $a2);
print_r($a1); // Array ( [0] => Mouse [1] => Horse [2] => Dog [3] => Cat )
echo "<br>";
print_r($a2); // Array ( [0] => Horse [1] => Cat [2] => Fido [3] => Missy )
echo "<br>";


$a1 = array("Dog", "Cat", "Horse", "Mouse", "Cat");
$a2 = array("Cat", "Fido", "Missy", "Cat", "Horse");
array_multisort($a1, $a2);
print_r($a1); // Array ( [0] => Cat [1] => Cat [2] => Dog [3] => Horse [4] => Mouse )
echo "<br>";
print_r($a2); // Array ( [0] => Fido [1] => Horse [2] => Cat [3] => Missy [4] => Cat )
echo "<br>";



// Trying sort type... -> SORT_NUMERIC
echo '<hr>Trying sort type... -> SORT_NUMERIC <br>';
$a1 = array("1Dog", "23Cat", "2Horse", "4Mouse", "Cat");
$a2 = array("9Cat", "909Fido", "23Missy", "1Cat", "2Horse");
array_multisort($a1, SORT_NUMERIC, $a2);
print_r($a1); // Array ( [0] => Cat [1] => 1Dog [2] => 2Horse [3] => 4Mouse [4] => 23Cat )
echo "<br>";
print_r($a2); // Array ( [0] => 2Horse [1] => 9Cat [2] => 23Missy [3] => 1Cat [4] => 909Fido )
echo "<br>";

echo 'Trying sort type... -> SORT_NUMERIC + SORT_DESC <br>';
$a1 = array("1Dog", "23Cat", "2Horse", "4Mouse", "Cat");
$a2 = array("9Cat", "909Fido", "23Missy", "1Cat", "2Horse");
array_multisort($a1, SORT_DESC, SORT_NUMERIC, $a2);
print_r($a1); // Array ( [0] => Cat [1] => 1Dog [2] => 2Horse [3] => 4Mouse [4] => 23Cat )
echo "<br>";
print_r($a2); // Array ( [0] => 2Horse [1] => 9Cat [2] => 23Missy [3] => 1Cat [4] => 909Fido )
echo "<br>";


// Trying sort type... -> SORT_NATURAL
echo '<hr>Trying sort type... -> SORT_NATURAL <br>';
$a1 = array("1Dog", "23Cat", "2Horse", "4Mouse", "Cat");
$a2 = array("9Cat", "909Fido", "23Missy", "1Cat", "2Horse");
array_multisort($a1, SORT_NATURAL, $a2);
print_r($a1); // Array ( [0] => 1Dog [1] => 23Cat [2] => 2Horse [3] => 4Mouse [4] => Cat )
echo "<br>";
print_r($a2); // Array ( [0] => 9Cat [1] => 909Fido [2] => 23Missy [3] => 1Cat [4] => 2Horse )
echo "<br>";


// Trying sort type... -> SORT_STRING
echo '<hr>Trying sort type... -> SORT_STRING <br>';
$a1 = array("1Dog", "23Cat", "2Horse", "4Mouse", "Cat");
$a2 = array("9Cat", "909Fido", "23Missy", "1Cat", "2Horse");
array_multisort($a1, SORT_STRING, $a2);
print_r($a1); // Array ( [0] => 1Dog [1] => 23Cat [2] => 2Horse [3] => 4Mouse [4] => Cat )
echo "<br>";
print_r($a2); // Array ( [0] => 9Cat [1] => 909Fido [2] => 23Missy [3] => 1Cat [4] => 2Horse )
echo "<br>";
