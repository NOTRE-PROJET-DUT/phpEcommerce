<?php

class db_connect {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    
    private static $instance;
    private $conn;

    // Private constructor to prevent instantiation
    private function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Public method to get a connection instance
    public static function getConnection($servername, $username, $password, $dbname)
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($servername, $username, $password, $dbname);
        }
        return self::$instance->conn;
    }

    // Private destructor to prevent closing the connection externally
    private function __destruct()
    {
        $this->conn->close();
    }

    // Private clone method to prevent cloning of the instance
    private function __clone() {}

}
