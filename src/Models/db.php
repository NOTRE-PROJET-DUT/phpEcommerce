<?php

class db_connect {

    private $servername;
    private $username;
    private $password;
    private $dbname;

    
    private static db_connect $instance;
    private $conn;


    // Constructor to initialize database connection
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
            die("Connection failed: " . $this->conn->connect_error);
        }
    }


    public static function getConnection($servername, $username, $password, $dbname)
    {
        if (!self::$instance) {
            self::$instance = new self($servername, $username, $password, $dbname);
        }
        return self::$instance->conn;
    }


    function __destruct()
    {
        $this->conn->close();
    }

}