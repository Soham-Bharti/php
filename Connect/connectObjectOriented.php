<?php
// Example (MySQLi Object-Oriented) ******************
// Open a Connection to MySQL
$serverName = "localhost";
$userName = "root";
$password = "root";

// creating connection
$con = new mysqli($serverName, $userName, $password);

// check connection
if ($con->connect_error) {
    die("Connection failed " . $con->connect_error);
}

echo "Connected successfully";

// var_dump($con); // object(mysqli)#1 (18) { ["affected_rows"]=> int(0) ["client_info"]=> string(13) "mysqlnd 8.2.4" ["client_version"]=> int(80204) ["connect_errno"]=> int(0) ["connect_error"]=> NULL ["errno"]=> int(0) ["error"]=> string(0) "" ["error_list"]=> array(0) { } ["field_count"]=> int(0) ["host_info"]=> string(20) "localhost via TCP/IP" ["info"]=> NULL ["insert_id"]=> int(0) ["server_info"]=> string(6) "8.0.36" ["server_version"]=> int(80036) ["sqlstate"]=> string(5) "00000" ["protocol_version"]=> int(10) ["thread_id"]=> int(15) ["warning_count"]=> int(0) }

// Close the Connection
$con->close();
echo "<br> connection clsoed!";
// var_dump($con); // object(mysqli)#1 (4) { ["client_info"]=> string(13) "mysqlnd 8.2.4" ["client_version"]=> int(80204) ["connect_errno"]=> int(0) ["connect_error"]=> NULL }
