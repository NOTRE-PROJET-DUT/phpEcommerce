<?php

use db_connect;

class order
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection("", "", "", "");
    }

    public function getOrderByUser($user_id)
    {
        $sql = "SELECT * FROM order_table WHERE user_id = '$user_id'";
        $result = $this->db->query($sql);
        return $result->fetch_all();
    }
}
