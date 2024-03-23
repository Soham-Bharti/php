<?php

class dbConnection
{
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $dbName = 'employeetracker';

    public function connect()
    {
        // creating connection
        $conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);

        // check connection
        if (!$conn) {
            // die("Connection failed! " . mysqli_connect_error());
            return null;
        }
        return $conn;
    }
}
