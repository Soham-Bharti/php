<?php

// $_SERVER
// $_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.

// $_SERVER['PHP_SELF']	Returns the filename of the currently executing script
echo $_SERVER['PHP_SELF']; // /php/Superglobals/$_SERVER.php

echo "<br>";

// $_SERVER['GATEWAY_INTERFACE']	Returns the version of the Common Gateway Interface (CGI) the server is using
echo $_SERVER['GATEWAY_INTERFACE']; // CGI/1.1

echo "<br>";

// _SERVER['SERVER_ADDR']	Returns the IP address of the host server
echo $_SERVER['SERVER_ADDR']; // ::1

echo "<br>";

// $_SERVER['SERVER_NAME']	Returns the name of the host server (such as www.w3schools.com)
echo $_SERVER['SERVER_NAME']; // localhost

echo "<br>";

// $_SERVER['SERVER_SOFTWARE']	Returns the server identification string (such as Apache/2.2.24)
echo $_SERVER['SERVER_SOFTWARE']; // Apache/2.4.54 (Win64) OpenSSL/1.1.1p PHP/8.1.12

echo "<br>";

// $_SERVER['SERVER_PROTOCOL']	Returns the name and revision of the information protocol (such as HTTP/1.1)
echo $_SERVER['SERVER_PROTOCOL']; // HTTP/1.1

echo "<br>";

// $_SERVER['REQUEST_METHOD']	Returns the request method used to access the page (such as POST)
echo $_SERVER['REQUEST_METHOD']; // GET

echo "<br>";

// $_SERVER['REQUEST_TIME']	Returns the timestamp of the start of the request (such as 1377687496)
echo $_SERVER['REQUEST_TIME']; // 1706617556

echo "<br>";

// $_SERVER['QUERY_STRING']	Returns the query string if the page is accessed via a query string
// echo $_SERVER['QUERY_STRING']; //  (Nothing for now)

echo "<br>";

// $_SERVER['HTTP_ACCEPT']	Returns the Accept header from the current request
echo $_SERVER['HTTP_ACCEPT']; // text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7

echo "<br";

// $_SERVER['HTTP_ACCEPT_CHARSET']	Returns the Accept_Charset header from the current request (such as utf-8,ISO-8859-1)
// echo $_SERVER['HTTP_ACCEPT_CHARSET']; // Warning: Undefined array key "HTTP_ACCEPT_CHARSET"

echo "<br>";
echo "<br>";

// $_SERVER['HTTP_HOST']	Returns the Host header from the current request
echo $_SERVER['HTTP_HOST']; // localhost

echo "<br>";

// $_SERVER['HTTP_REFERER']	Returns the complete URL of the current page (not reliable because not all user-agents support it)
// echo $_SERVER['HTTP_REFERER']; // Warning: Undefined array key "HTTP_REFERER"

echo "<br";

// $_SERVER['HTTPS']	Is the script queried through a secure HTTP protocol
// echo $_SERVER['HTTPS']; // Warning: Undefined array key "HTTPS"

echo "<br";

// $_SERVER['REMOTE_ADDR']	Returns the IP address from where the user is viewing the current page
// echo $_SERVER['REMOTE_ADDR']; // (no output for now)

echo "<br> Tutorial examples...<br>";

echo $_SERVER['PHP_SELF']; // /php/Superglobals/$_SERVER.php
echo "<br>";
echo $_SERVER['SERVER_NAME']; // localhost
echo "<br>";
echo $_SERVER['HTTP_HOST']; // localhost
echo "<br>";
// echo $_SERVER['HTTP_REFERER']; // Warning: Undefined array key "HTTP_REFERER"
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT']; // Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36
echo "<br>";
echo $_SERVER['SCRIPT_NAME']; // /php/Superglobals/$_SERVER.php
echo "<br>";
