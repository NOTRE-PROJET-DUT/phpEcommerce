<?php

include_once 'db.php';

class order
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection();
    }

    public function getOrderByUser($user_id) {
        $sql = "SELECT * FROM order_table WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $orders;
    }
    
}
