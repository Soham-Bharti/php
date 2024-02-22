<?php

// implode VS join --> No difference
$str = array(1,"soham", 3.4);
$implodedStr =  implode(",",$str);
var_dump($implodedStr);
echo("<br>");

$joinedStr = join($str);
var_dump($joinedStr);
