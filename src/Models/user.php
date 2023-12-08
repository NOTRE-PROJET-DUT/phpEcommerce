<?php

include_once 'db.php';

class User
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
    
        return ($user && password_verify($password, $user['password']));
    }
    
    
    public function forgetPassword($email, $checkpass) {
        $stmt = $this->db->prepare("SELECT secret_code FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $passwordsMatch = false;
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $passwordsMatch = ($row['secret_code'] === $checkpass);
        }
    
        $stmt->close();
    
        return $passwordsMatch;
    }
    
    
    public function createAccountUser($email, $password, $secretCode) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (secret_code, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $secretCode, $email, $hashedPassword);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }
    

    public function getUser($id) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    
        if ($user) {
            return $user;
        }
    }
    

    public function getUserByEmail($email) {
        $sql = "SELECT user_id FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    
        if ($user) {
            return $user;
        }
    }
    


    
    public function updateUser($id, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET email = ?, password = ? WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssi", $email, $hashedPassword, $id);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }
    

    public function updateUserPassword($email, $newpassword) {
        $userData = $this->getUserByEmail($email);
    
        if (!empty($userData)) {
            // Assuming 'user_id' is the key for the user ID in the result array
            $id = $userData[0]['user_id'];
    
            $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = ? WHERE user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("si", $hashedPassword, $id);
            $query = $stmt->execute();
            $stmt->close();
            return $query;
        } else {
            // Handle the case where no user with the specified email is found
            return false;
        }
    }
    

    
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }
    
}
