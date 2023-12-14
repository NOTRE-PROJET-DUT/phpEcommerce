<?php

include_once __DIR__ . '/db.php';

class Admin
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection();
    }

    public function login($userName, $password)
    {
        if (!isset($userName, $password)) {
            return false;
        }
        if (!$this->isUsernameExists($userName)) {
            return false; // Return false to indicate that the email or username already exists
        }

        $sql = "SELECT * FROM admins WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return (password_verify($password, $user['password']));
    }


    // Function to check if the email already exists
    private function isEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM admins WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_assoc()['COUNT(*)'];

        $stmt->close();

        return $count > 0; // If count is greater than 0, the email already exists
    }
    // Function to check if the username already exists
    private function isUsernameExists($username)
    {
        $sql = "SELECT COUNT(*) FROM admins WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_assoc()['COUNT(*)'];

        $stmt->close();

        return $count > 0; // If count is greater than 0, the username already exists
    }


    public function createAccountAdmin($username, $email, $password, $secretCode)
    {
        if (!isset($username, $email, $password, $secretCode)) {
            return false;
        }
        if ($this->isEmailExists($email) || $this->isUsernameExists($username)) {
            return false; // Return false to indicate that the email or username already exists
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (username, email, password, secret_Code) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $secretCode);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }


    public function getAdmin($username)
    {
        $query = "SELECT * FROM admins WHERE username LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $adminData = $result->fetch_assoc();
        $stmt->close();
        return $adminData;
    }

    public function getAdminByID($id)
    {
        $query = "SELECT * FROM admins WHERE admin_id LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $adminData = $result->fetch_assoc();
        $stmt->close();
        return $adminData;
    }


    public function updateAdmin($admin_id, $password, $email, $phone, $address)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admins SET password = ?, email = ? WHERE admin_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $hashedPassword, $email, $admin_id);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }



    public function deleteAdmin($username)
    {
        $sql = "DELETE FROM admins WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $username);
        $query = $stmt->execute();
        $stmt->close();
        return $query;
    }


    public function forgetPassword($email, $checkpass)
    {
        $stmt = $this->db->prepare("SELECT secret_code FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $passwordsMatch = false;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $passwordsMatch = ($row['secret_code'] == $checkpass);
        }

        $stmt->close();

        return $passwordsMatch;
    }
}
