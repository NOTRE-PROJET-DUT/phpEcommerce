<?php

include_once 'db.php';

class Order
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
    public function createOrder($user_id, $total_amount) {
        // Start a database transaction
        $this->db->begin_transaction();
    
        try {
            // Insert the order into the orders table
            $insertOrderSQL = "INSERT INTO orders (user_id, total_amount) VALUES (?, ?)";
            $stmtOrder = $this->db->prepare($insertOrderSQL);
    
            // Check for errors in the preparation of the statement
            if (!$stmtOrder) {
                throw new Exception("Order creation failed.");
            }
    
            $stmtOrder->bind_param("id", $user_id, $total_amount);
            $stmtOrder->execute();
    
            // Check for errors in the execution of the statement
            if ($stmtOrder->errno) {
                throw new Exception("Order creation failed.");
            }
    
            // Retrieve the auto-generated order ID
            $order_id = $stmtOrder->insert_id;
    
            // Close the statement
            $stmtOrder->close();
    
            // Commit the transaction
            $this->db->commit();
    
            // Return the order ID
            return $order_id;
        } catch (Exception $e) {
            // An error occurred, rollback the transaction
            $this->db->rollback();
    
            // Handle the error, for example, log it or return an error response
            return -1;
        }
    }


    public function insertOrderItem($order_id, $product_id, $quantity, $price) {
        // Start a database transaction
        $this->db->begin_transaction();
    
        try {
            // Insert the order item into the order_items table
            $insertOrderItemSQL = "INSERT INTO order_items (order_id, product_id, quantity, price,status) VALUES (?, ?, ?, ?,'pending')";
            $stmtOrderItem = $this->db->prepare($insertOrderItemSQL);
    
            // Check for errors in the preparation of the statement
            if (!$stmtOrderItem) {
                throw new Exception("Order item insertion failed.");
            }
    
            $stmtOrderItem->bind_param("iiid", $order_id, $product_id, $quantity, $price);
            $stmtOrderItem->execute();
    
            // Check for errors in the execution of the statement
            if ($stmtOrderItem->errno) {
                throw new Exception("Order item insertion failed.");
            }
    
            // Close the statement
            $stmtOrderItem->close();
    
            // Commit the transaction
            $this->db->commit();
    
            // Return true indicating success
            return true;
        } catch (Exception $e) {
            // An error occurred, rollback the transaction
            $this->db->rollback();
    
            // Handle the error, for example, log it or return an error response
            return false;
        }
    }
    
    public function getproductOrder($user_id) {
       $sql ="SELECT
    o.order_id,
    o.user_id,
    oi.order_item_id,
    p.product_name,
    p.category,
    oi.quantity,
    oi.price,
    oi.status,
    o.total_amount,
    o.order_date
FROM
    orders o
JOIN
    order_items oi ON o.order_id = oi.order_id
JOIN
    products p ON oi.product_id = p.product_id
WHERE
    o.user_id = ?;";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $orders = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $orders;}

}
