<?php

require_once 'db.php';
class Product {

    private $db;

    public function __construct() {
        $this->db = db_connect::getConnection();
    }


    public function createProduct($admin, $productName, $price, $description, $imagePath, $category, $stockQuantity) {
        if (empty($productName) || !is_numeric($price) || empty($description) || empty($category) || !is_numeric($stockQuantity)) {
            return false;
        }
    
        $query = "INSERT INTO products (product_name, price, description, image_url, category, admin_id, stock_quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdsssi", $productName, $price, $description, $imagePath, $category, $admin, $stockQuantity);
        $result = $stmt->execute();
        $stmt->close();
    
        return $result;
    }
    

    public function getProducts($offset = 0) {
        $offset = $offset * 20;
        $query = "SELECT * FROM products LIMIT 20 OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $offset);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result) {
            $products = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $products;
        } else {
            $stmt->close();
            return [];
        }
    }
    

    public function getProductsByCategory($category, $offset = 0) {
        $offset = $offset * 20;
        $query = "SELECT * FROM products WHERE category LIKE ? LIMIT 20 OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $category, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $products;
    }
    


    public function getProduct($id) {
        $query = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
        return $product;
    }
    

    public function updateProduct($id, $productName, $price, $description, $stockQuantity) {
        $query = "UPDATE products SET product_name = ?, price = ?, description = ?, stock_quantity = ? WHERE product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdsii", $productName, $price, $description, $stockQuantity, $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
}