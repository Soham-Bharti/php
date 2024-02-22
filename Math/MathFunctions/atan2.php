<?php

// PHP atan2() Function
// The atan2() function returns the arc tangent of y/x, in radians. Where x and y are the coordinates of a point (x,y).

// Syntax
// atan2(y,x); --> Required. Specifies a positive or negative number


echo (atan2(0, 0) . "<br>"); // 0
echo (atan2(0.50, 0.50) . "<br>"); // 0.78539816339745
echo (atan2(-0.50, -0.50) . "<br>"); // -2.3561944901923
echo (atan2(5, 5) . "<br>"); // 0.78539816339745    
echo (atan2(10, 20) . "<br>"); // 0.46364760900081
echo (atan2(-5, -5) . "<br>"); // -2.3561944901923
echo (atan2(-10, 10)) . "<br>"; // -0.78539816339745
echo (atan2(10, -10)); // 2.3561944901923