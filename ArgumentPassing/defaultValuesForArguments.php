<?php

function minAge($age = 20)
{
    echo $age;
}

// default values for functions are declared in the parameters so we the function is called without any arguments then the default values are used instead

minAge(); // 20
minAge(22); // 22
