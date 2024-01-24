<?php

// PHP decoct() Function
// The decoct() function converts a decimal number to an octal number.

// Syntax
// decoct(number);


echo decoct("30") . "<br>"; // 36
echo decoct("10") . "<br>"; // 12
echo decoct("10.30") . "<br>"; // 12
echo decoct("-10.30") . "<br>"; // 1777777777777777777766
echo decoct("1587") . "<br>"; // 3063
echo decoct("70"); // 106
