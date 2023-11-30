<?php

use db_connect;

class admin {

    private $db;

    public function __construct() {
        $this->db = db_connect::getConnection("","","","");
    }

    public function login($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$hashedPassword'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function createAccountAdmin($username, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$hashedPassword')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getAdmin($username)
    {
        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function updateAdmin($username,$password,$email,$phone,$address ){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET password = '$hashedPassword', email = '$email', phone = '$phone', address = '$address' WHERE username = '$username'";
        $query = $this->db->query($sql);
        return $query;
    }


    public function deleteAdmin($username)
    {
        $sql = "DELETE FROM admin WHERE username = '$username'";
        $query = $this->db->query($sql);
        return $query;
    }
}