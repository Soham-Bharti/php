<?php
/*
// 1. Casting into string
$a = 5;
$b = 5.67;
$c = "Hello";
$d = null;
$e = true;

$a = (string) $a;
$b = (string) $b;
$c = (string) $c;
$d = (string) $d;
$e = (string) $e;

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);

// 2. Castig into integer
$a = 5;
$b = 5.67;
$c = "Hello";
$d = null;
$e = true;
$f = "27 Killo";
$g = "Killo 27";

$a = (int) $a;
$b = (int) $b;
$c = (int) $c;
$d = (int) $d;
$e = (int) $e;
$f = (int) $f;
$g = (int) $g;

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
var_dump($f);
var_dump($g);


// 3. Castig into float
$a = 5;
$b = 5.67;
$c = "Hello";
$d = null;
$e = true;
$f = "27 Killo";
$g = "Killo 27";

$a = (float) $a;
$b = (float) $b;
$c = (float) $c;
$d = (float) $d;
$e = (float) $e;
$f = (float) $f;
$g = (float) $g;

var_dump($a); // 5
var_dump($b); // 5.67
var_dump($c); // 0
var_dump($d); // 0
var_dump($e); // 1
var_dump($f); // 27
var_dump($g); // 0



// 4. Casting into boolean 
// If a value is 0, NULL, false, or empty, the (bool) converts it into false, otherwise true. Even -1 converts to true.
$a = 5;       // Integer
$b = 5.34;    // Float
$c = 0;       // Integer
$d = -1;      // Integer
$e = 0.1;     // Float
$f = "hello"; // String
$g = "";      // String
$h = true;    // Boolean
$i = NULL;    // NULL

$a = (bool) $a;
$b = (bool) $b;
$c = (bool) $c;
$d = (bool) $d;
$e = (bool) $e;
$f = (bool) $f;
$g = (bool) $g;
$h = (bool) $h;
$i = (bool) $i;

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
var_dump($f);
var_dump($g);
var_dump($h);
var_dump($i);



// 5. Casting into array
$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (array) $a;
$b = (array) $b;
$c = (array) $c;
$d = (array) $d;
$e = (array) $e;

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e); // array(0) { }



// 6. Casting into Objects
$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (object) $a;
$b = (object) $b;
$c = (object) $c;
$d = (object) $d;
$e = (object) $e;

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);

// When converting into objects, most data types converts into a object with one property, named "scalar", with the corresponding value



// 7. Casting Arrays into Objects
$a = array("Volvo", "BMW", "Toyota"); // indexed array
$b = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); // associative array

$a = (object) $a;
$b = (object) $b;

var_dump($a); // Indexed arrays converts into objects with the index number as property name and the value as property value.
var_dump($b); // Associative arrays converts into objects with the keys as property names and values as property values.





// 8. Casting into NULL -> The (unset) cast is no longer supported 
$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (unset) $a; //  The (unset) cast is no longer supported 
$b = (unset) $b;
$c = (unset) $c;
$d = (unset) $d;
$e = (unset) $e;

var_dump($a); //  The (unset) cast is no longer supported 
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);


*/


