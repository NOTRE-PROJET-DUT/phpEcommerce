<?php

class db_connect {
    
    private static $instance;
    private $conn;

    // Private constructor to prevent instantiation
    private function __construct()
    {
        $servername = "127.0.0.1";//localhost" not work in ubuntu same time  
        $username = "root";
        $password = "";
        $dbname = "shop";
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Public method to get a connection instance
    public static function getConnection()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance->conn;
    }

    // Private destructor to prevent closing the connection externally
    public function __destruct()
    {
        $this->conn->close();
    }

    // Private clone method to prevent cloning of the instance
    private function __clone() {}

}
