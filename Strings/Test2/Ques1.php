<?php

// 1. find the username from the given email using pure string function. 
// ex : anant@gmail.com => answer : anant

$email = 'anant@gmail.com';


echo strchr($email, '@', true);
