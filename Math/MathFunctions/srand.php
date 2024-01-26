<?php

// PHP srand() Function
// The srand() function seeds the random number generator (rand()).
// Tip: From PHP 4.2.0, the random number generator is seeded automatically and there is no need to use this function.


srand(mktime(5));
echo (rand()); // 831302037, 742508275, ...
