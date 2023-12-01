<?php

include 'db.php';
class Product {

    private $db;

    public function __construct() {
        $this->db = db_connect::getConnection("","","","");
    }


    public function createProduct(string $productName,float $price,string $description,string $category,int $stockQuantity)
    {
        // Validate input (you may want to add more robust validation)
        if (empty($productName) || empty($price) || empty($description) || empty($category) || empty($stockQuantity)){
            return "Please fill in all the fields.";
        }

        // Insert product into the database
        $query = "INSERT INTO products (product_name, price, description, category, stock_quantity) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bind_param("sdssi", $productName, $price, $description, $category, $stockQuantity);

        // Execute the query
        if ($stmt->execute()) {
            return "Product created successfully.";
        } else {
            return "Error creating product: " . $stmt->error;
        }
    }

    public function getProducts()
    {
        // Retrieve products from the database
        $query = "SELECT * FROM products LIMIT 20 OFFSET 0";
        $result = $this->db->query($query);

        if ($result) {
            // Fetch data as an associative array
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return "Error fetching products: " . $this->db->error;
        }
    }

    public function getProductsByCategory($category)
    {
        // Retrieve products from the database
        $query = "SELECT * FROM products where category LIKE '$category' LIMIT 20 OFFSET 0";
        $result = $this->db->query($query);

        if ($result) {
            // Fetch data as an associative array
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return "Error fetching products: " . $this->db->error;
        }
    }


    public function getProduct($id)
    {
        // Retrieve product from the database
        $query = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute the query
        $stmt->execute();

        // Fetch data as an associative array
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        return $product;
    }

    public function updateProduct($id, $productName, $price, $description, $stockQuantity)
    {
        // Update product in the database
        $query = "UPDATE products SET product_name = ?,price = ?, description = ? , stock_quantity = ? WHERE product_id = ?";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bind_param("sdsii", $productName, $price, $description, $id, $stockQuantity);

        // Execute the query
        if ($stmt->execute()) {
            return "Product updated successfully.";
        }
        return "Error updating product: " . $this->db->error;
    }

    public function deleteProduct($id)
    {
        // Delete product from the database
        $query = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute the query
        if ($stmt->execute()) {
            return "Product deleted successfully.";
        }
        return "Error deleting product: " . $this->db->error;
    }
}