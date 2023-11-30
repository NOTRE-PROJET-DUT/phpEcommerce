<?php

use db_connect;

class orderItems
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection("", "", "", "");
    }

    public function updateOrderStatus($order_id, $status)
    {
        $sql = "UPDATE orders SET status = '$status' WHERE order_id = '$order_id'";
        $this->db->query($sql);
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
        products.description,
        products.image_url,
        admins.username AS admin_username
        FROM
            order_items
        JOIN
            products ON order_items.product_id = products.product_id
        JOIN
            admins ON admins.admin_id = products.admin_id
        WHERE
            admins.admin_id = ";
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
            order_items.order_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);

        return $items;
    }

}   