-- Insert an administrator
INSERT INTO admins (username, email, password) VALUES ('admin1', 'admin1@example.com', 'hashed_password_1');

-- Insert a user
INSERT INTO users (email, password, checkpass) VALUES ('user1@example.com', 'hashed_password_2', 'hashed_checkpass');

-- Insert a product with admin_id = 1 (assuming admin_id 1 exists)
INSERT INTO products (product_name, description, image_url, price, stock_quantity, admin_id) 
VALUES ('Product 1', 'Description for Product 1', 'image_url_1.jpg', 19.99, 100, 1);

-- Insert an order for user_id = 1 (assuming user_id 1 exists)
INSERT INTO orders (user_id, total_amount) VALUES (1, 19.99);

-- Insert order items for the order_id 1 and product_id 1
INSERT INTO order_items (order_id, product_id, status, quantity, price) 
VALUES (1, 1, 'pending', 2, 39.98);

-- Insert another product with admin_id = 1
INSERT INTO products (product_name, description, image_url, price, stock_quantity, admin_id) 
VALUES ('Product 2', 'Description for Product 2', 'image_url_2.jpg', 29.99, 50, 1);

-- Insert an order for user_id = 1
INSERT INTO orders (user_id, total_amount) VALUES (1, 29.99);

-- Insert order items for the order_id 2 and product_id 2
INSERT INTO order_items (order_id, product_id, status, quantity, price) 
VALUES (2, 2, 'pending', 1, 29.99);
