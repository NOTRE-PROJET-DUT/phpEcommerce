<?php

use db_connect;

class user {

    private $db;

    public function __construct() {
        $this->db = db_connect::getConnection("","","","");
    }

    public function login($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$hashedPassword'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function createAccountUser($email, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$hashedPassword')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function getUserbyemail($email)
    {
        $sql = "SELECT id FROM user WHERE email = '$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function updatedUser($id, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET email = '$email', password = '$hashedPassword' WHERE id = '$id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updatedUserPassword($email,$newpassword){
        $id = getUserbyemail($email);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET  password = '$hashedPassword' WHERE id = '$id'";
        $query = $this->db->query($sql);


    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = '$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}