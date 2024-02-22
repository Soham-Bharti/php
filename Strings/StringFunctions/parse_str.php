<?php

// PHP parse_str() Function
// Parses a query string into variables

// Syntax
// parse_str(string,array)

parse_str("name=soham&age=27", $arr);

echo $arr["name"]. "<br>"; // soham

echo $arr["age"]. "<br>"; // 27