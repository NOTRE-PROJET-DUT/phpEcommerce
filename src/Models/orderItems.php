<?php

include_once 'db.php';

class OrderItems
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection();
    }

    public function updateOrderStatus($order_item_id, $status) {
        $sql = "UPDATE order_items SET status = ? WHERE order_item_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $status, $order_item_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    


    public function getOrderItemsAdmin($admin_id)
    {
        $sql = "SELECT
        order_items.order_item_id,
        order_items.product_id,
        order_items.quantity,
        order_items.status,
        order_items.price,
        products.product_name,
        products.image_url,
        products.category
        FROM
            order_items
        JOIN
            products ON order_items.product_id = products.product_id
        JOIN
            admins ON admins.admin_id = products.admin_id
        WHERE
            admins.admin_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrderItemsDeliveredAdmin($admin_id)
    {
        $sql = "SELECT
                    CONCAT(users.first_name, ' ', users.last_name) AS full_name,
                    users.email AS user_email,
                    products.product_name,
                    order_items.price,
                    order_items.status 
                FROM
                    admins
                JOIN
                    products ON admins.admin_id = products.admin_id
                JOIN
                    order_items ON products.product_id = order_items.product_id
                JOIN
                    orders ON order_items.order_id = orders.order_id
                JOIN
                    users ON orders.user_id = users.user_id
                WHERE
                    admins.admin_id = ?
                    AND order_items.status = 'delivered'
                LIMIT 10;
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);

        return $items;
    }

    public function getOrderItemsUser($order_id)
    {
        $sql = "SELECT
            order_items.order_item_id,
            products.product_name,
            order_items.quantity,
            order_items.price
        FROM
            order_items
        JOIN
            products ON order_items.product_id = products.product_id
        WHERE
            order_items.order_id = ?
            LIMIT 10;
            ";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);

        return $items;
    }
}
