<?php

// const() V/S define()

// const are always case-sensitive
// define() has has a case-insensitive option.
// const cannot be created inside another block scope, like inside a function or inside an if statement.
// define can be created inside another block scope.


define('say', 'Hii..saying');
function test()
{
    define('say2', 'Hii..saying 2nd time');
}
test();


const greet = 'Hii..saying';
function test2()
{
    // const greet2 = 'Hii..saying 2nd time';  // syntax error, unexpected token "const" Unexpected const'.
}
test();
