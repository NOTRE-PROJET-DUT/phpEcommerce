<?php

include 'db.php';

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
        $sql = "SELECT * FROM admins WHERE username = '$username'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function updateAdmin($username,$password,$email,$phone,$address ){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admins SET password = '$hashedPassword', email = '$email', phone = '$phone', address = '$address' WHERE username = '$username'";
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