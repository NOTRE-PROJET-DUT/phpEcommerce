<?php

include_once __DIR__. '/db.php';

class Admin {

    private $db;

    public function __construct() {
        $this->db = db_connect::getConnection();
    }

    public function login($userName, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $userName, $hashedPassword);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    
    

    public function createAccountAdmin($username, $email, $password, $secretCode) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (username, email, password, secret_Code) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $secretCode);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }
    

    public function getAdmin($username) {
        $query = "SELECT * FROM admins WHERE username LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $adminData = $result->fetch_assoc();
        $stmt->close();
        return $adminData;
    }

    public function getAdminByID($id) {
        $query = "SELECT * FROM admins WHERE admin_id LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $adminData = $result->fetch_assoc();
        $stmt->close();
        return $adminData;
    }
    

    public function updateAdmin($admin_id, $password, $email, $phone, $address) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admins SET password = ?, email = ? WHERE admin_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $hashedPassword, $email, $admin_id);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }
    


    public function deleteAdmin($username) {
        $sql = "DELETE FROM admins WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $username);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }
    
}