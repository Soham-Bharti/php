<?php

// __FUNCTION__	
// If inside a function, the function name is returned.

function myValue()
{
    return __FUNCTION__;
}
echo myValue(); // myValue
