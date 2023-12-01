<?php

include 'db.php';

class user
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection();
    }

    public function login($email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashedPassword'";
       return $this->db->query($sql);
       
    }
    public function forgotpassword($email, $checkpass) {
        // Use prepared statement to avoid SQL injection
        $stmt = $this->db->prepare("SELECT checkpass FROM users WHERE email = ?");
        
        // Bind the parameter
        $stmt->bind_param("s", $email);
    
        // Execute the query
        $stmt->execute();
    
        // Get the result
        $result = $stmt->get_result();
    
        // Check if there is a row with the specified email
        if ($result->num_rows > 0) {
            // Fetch the row
            $row = $result->fetch_assoc();
            
            // Compare the stored checkpass with the provided $checkpass
            if ($row['checkpass'] === $checkpass) {
                // Passwords match, do something
                return true;
            } else {
                // Passwords do not match
                return false;
            }
        } else {
            // No user found with the specified email
            return false;
        }
    
        // Close the statement
        $stmt->close();
    }
    
    public function createAccountUser($email, $password,$checkpass)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (checkpass,email, password) VALUES ('$checkpass','$email', '$hashedPassword')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = '$id'";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function getUserbyemail($email)
{
    $sql = "SELECT user_id FROM users WHERE email = '$email'";
    $query = $this->db->query($sql);
    if ($query->num_rows > 0) {
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}

    
    public function updatedUser($id, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET email = '$email', password = '$hashedPassword' WHERE user_id = '$id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updatedUserPassword($email, $newpassword)
{
    $userData = $this->getUserbyemail($email);

    if (!empty($userData)) {
        // Assuming 'id' is the key for the user ID in the result array
        $id = $userData[0]['user_id'];

        $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$hashedPassword' WHERE user_id = '$id'";
        $query = $this->db->query($sql);
        return $query;
    } else {
        // Handle the case where no user with the specified email is found
        return false;
    }
}

    
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE user_id = '$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}
