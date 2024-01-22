<?php

// PHP join() Function
// Alias of implode()

// Syantax
// join(separator,array)    

$arr = array('Hello', 'World!', 'Beautiful', 'Day!');
echo join(" ", $arr) . "<br>"; // Hello World! Beautiful Day!

$strArray = ['This', 'is', 'soham', 'at', 'your', 'service.'];
echo join(' ', $strArray) . "<br>"; // This is soham at your service.
echo join('+', $strArray) . "<br>"; // This+is+soham+at+your+service.
echo join('-', $strArray) . "<br>"; // This-is-soham-at-your-service.
echo join('/', $strArray) . "<br>"; // This/is/soham/at/your/service.
echo join('*', $strArray) . "<br>"; // This*is*soham*at*your*service.
echo join('..', $strArray) . "<br>"; // This..is..soham..at..your..service.

