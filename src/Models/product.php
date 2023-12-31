<?php

include_once 'db.php';
class Product
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect::getConnection();
    }


    public function createProduct($adminId, $productName, $price, $description, $imagePath, $category, $stockQuantity)
    {
        if (empty($productName) || !is_numeric($price) || empty($description) || empty($category) || !is_numeric($stockQuantity)) {
            return false;
        }

        $query = "INSERT INTO products (product_name, price, description, image_url, category, admin_id, stock_quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdsssii", $productName, $price, $description, $imagePath, $category, $adminId, $stockQuantity);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }


    public function getProducts($offset = 0)
    {
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


    public function getAdminProducts($adminId, $offset = 0)
    {
        $offset = $offset * 20;
        $query = "SELECT * FROM products where admin_id = ? LIMIT 20 OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $adminId, $offset);
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

    public function getProductSalesData($adminId)
    {
        $sql = " SELECT 
                    MONTH(o.order_date) AS month,
                    COUNT(oi.order_item_id) AS num_sales
                FROM 
                    orders o
                JOIN 
                    order_items oi ON o.order_id = oi.order_id
                JOIN 
                    products p ON oi.product_id = p.product_id
                WHERE 
                    p.admin_id = ?
                GROUP BY 
                    MONTH(o.order_date)
                    AND YEAR(o.order_date) = YEAR(CURDATE())
                ORDER BY 
                    month;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductRevenueData($adminId)
    {
        $sql = " SELECT 
                    MONTH(o.order_date) AS month,
                    SUM(oi.price * oi.quantity) AS total_sales_revenue
                FROM 
                    orders o
                JOIN 
                    order_items oi ON o.order_id = oi.order_id
                JOIN 
                    products p ON oi.product_id = p.product_id
                WHERE 
                    p.admin_id = ?
                    AND YEAR(o.order_date) = YEAR(CURDATE())
                GROUP BY 
                    MONTH(o.order_date)
                ORDER BY 
                    month;
                ";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getProductTransactionData($adminId)
    {
        // Set admin_id
        $sql = "SET @admin_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $stmt->close();

        // Main query
        $sql = "SELECT
                SUM(oi.price * oi.quantity) / yearly_totals.yearly_revenue * 100 AS RevenuePercentage,
                COUNT(DISTINCT o.order_id) / yearly_totals.yearly_transactions * 100 AS NumTransactionsPercentage,
                AVG(oi.price * oi.quantity) / yearly_totals.yearly_avg_value * 100 AS AvgTransactionValuePercentage,
                (SUM(oi.price * oi.quantity) - SUM(
                    CASE WHEN c.coupon_type = 'Percentage' THEN oi.price * oi.quantity * (1 - c.discount_value / 100)
                         WHEN c.coupon_type = 'Fixed' THEN oi.price * oi.quantity - c.discount_value
                         ELSE 0
                    END
                )) / yearly_totals.yearly_coupon_sales * 100 AS CouponSalesPercentage,
                SUM(oi.price * oi.quantity) AS Revenue,
                COUNT(DISTINCT o.order_id) AS NumTransactions,
                AVG(oi.price * oi.quantity) AS AvgTransactionValue,
                (SUM(oi.price * oi.quantity) - SUM(
                    CASE WHEN c.coupon_type = 'Percentage' THEN oi.price * oi.quantity * (1 - c.discount_value / 100)
                         WHEN c.coupon_type = 'Fixed' THEN oi.price * oi.quantity - c.discount_value
                         ELSE 0
                    END
                )) AS CouponSales
            FROM
                orders o
            JOIN order_items oi ON
                o.order_id = oi.order_id
            LEFT JOIN products p ON
                p.product_id = oi.product_id
            LEFT JOIN coupons c ON
                p.coupon_id = c.coupon_id
            LEFT JOIN (
                SELECT
                    YEAR(o.order_date) AS order_year,
                    SUM(oi.price * oi.quantity) AS yearly_revenue,
                    COUNT(DISTINCT o.order_id) AS yearly_transactions,
                    AVG(oi.price * oi.quantity) AS yearly_avg_value,
                    (SUM(oi.price * oi.quantity) - SUM(
                        CASE WHEN c.coupon_type = 'Percentage' THEN oi.price * oi.quantity * (1 - c.discount_value / 100)
                             WHEN c.coupon_type = 'Fixed' THEN oi.price * oi.quantity - c.discount_value
                             ELSE 0
                        END
                    )) AS yearly_coupon_sales
                FROM
                    orders o
                JOIN order_items oi ON
                    o.order_id = oi.order_id
                LEFT JOIN products p ON
                    p.product_id = oi.product_id
                LEFT JOIN coupons c ON
                    p.coupon_id = c.coupon_id
                WHERE
                    p.admin_id = @admin_id
                GROUP BY
                    YEAR(o.order_date)
            ) AS yearly_totals ON
                YEAR(o.order_date) = yearly_totals.order_year
            WHERE
                p.admin_id = @admin_id
            GROUP BY
                YEAR(o.order_date);
            ";

        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            throw new mysqli_sql_exception(mysqli_error($this->db));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }




    public function getProductsByCategory($category, $offset = 0)
    {
        $offset = $offset * 20;
        $query = "SELECT * FROM products WHERE category LIKE ? LIMIT 20 OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $category, $offset);
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

    public function getProductsByName($name, $offset = 0)
    {
        $offset = $offset * 20;
        $query = "SELECT * FROM products WHERE product_name LIKE ? LIMIT 20 OFFSET ?";
        $stmt = $this->db->prepare($query);
        $v =  "%$name%";
        $stmt->bind_param("si",$v , $offset);
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



    public function getMostPurchasedProducts()
    {

        $query="SELECT
                    p.product_id,
                    p.product_name,
                    p.category,
                    p.description,
                    p.price,
                    p.image_url,
                    SUM(oi.quantity) AS total_quantity_sold
                FROM
                    products p
                LEFT JOIN
                    order_items oi ON p.product_id = oi.product_id
                LEFT JOIN
                    orders o ON oi.order_id = o.order_id
                GROUP BY
                    p.product_id, p.product_name, p.category, p.description, p.price, p.image_url
                ORDER BY
                    total_quantity_sold DESC
                LIMIT 20;";

        $stmt = $this->db->prepare($query);
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



    public function getProduct($id)
    {
        $query = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
        return $product;
    }


    public function updateProduct($idProduct, $productName, $price, $description, $imagePath, $category, $stockQuantity)
    {
        $query = "UPDATE products SET product_name = ?, price = ?, description = ?,image_url=?,category =?, stock_quantity = ? WHERE product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdsssii", $productName, $price, $description, $imagePath, $category, $stockQuantity, $idProduct);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }


    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
