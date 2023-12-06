<?php

require_once 'db.php';

class Admin {

    private $db;

    public function __construct() {
        $this->db = db_connect::getConnection();
    }

    public function login($userName, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM admins WHERE username = '$userName' AND password = '$hashedPassword'";
        return $this->db->query($sql);
        
    }

    public function createAccountAdmin($username,$email , $password,$secretCode){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (username,email , password,secretCode ) VALUES ('$username','$email', '$hashedPassword','$secretCode')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getAdmin($username)
    {
        $query = "SELECT * FROM admins WHERE username like ?";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bind_param("s", $username);

        // Execute the query
        $stmt->execute();

        // Fetch data as an associative array
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateAdmin($username,$password,$email,$phone,$address ){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admins SET password = '$hashedPassword', email = '$email' WHERE username = '$username'";
        $query = $this->db->query($sql);
        return $query;
    }


    public function deleteAdmin($username)
    {
        $sql = "DELETE FROM admins WHERE username = '$username'";
        $query = $this->db->query($sql);
        return $query;
    }
}