<?php


// PHP mt_srand() Function
// The mt_srand() function seeds the Mersenne Twister random number generator.

mt_srand(mktime(1));
echo (mt_rand() . "<br>"); // 72139256, 1620337667, ...
mt_srand(mktime(1, MT_RAND_MT19937));
echo (mt_rand()); // 996786548, 1879900975, ...
