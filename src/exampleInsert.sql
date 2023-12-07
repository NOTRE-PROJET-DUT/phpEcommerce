-- Inserting data into the admins table
INSERT INTO admins (username, email, password, description, first_name, last_name, image_url, address, city, state, postal_code, country, phone_number, secret_code)
VALUES
('admin1', 'admin1@example.com', 'hashed_password', 'Admin 1 Description', 'Admin', 'One', 'admin1_image.jpg', 'Admin Address', 'Admin City', 'Admin State', '12345', 'Admin Country', '123-456-7890', 'admin_secret_code'),
('admin2', 'admin2@example.com', 'hashed_password', 'Admin 2 Description', 'Admin', 'Two', 'admin2_image.jpg', 'Admin Address', 'Admin City', 'Admin State', '12345', 'Admin Country', '123-456-7890', 'admin_secret_code');

-- Inserting data into the users table
INSERT INTO users (email, password, first_name, last_name, address, city, state, postal_code, country, phone_number, secret_code)
VALUES
('user1@example.com', 'hashed_password', 'User', 'One', 'User Address', 'User City', 'User State', '54321', 'User Country', '987-654-3210', 'user_secret_code'),
('user2@example.com', 'hashed_password', 'User', 'Two', 'User Address', 'User City', 'User State', '54321', 'User Country', '987-654-3210', 'user_secret_code');

-- Inserting data into the products table
INSERT INTO products (product_name, description, image_url, price, stock_quantity, category, admin_id)
VALUES
('Product 1', 'Description for Product 1', 'product1_image.jpg', 29.99, 50, 'Electronics', 1),
('Product 2', 'Description for Product 2', 'product2_image.jpg', 19.99, 30, 'Clothing', 2);

-- Inserting data into the orders table
INSERT INTO orders (user_id, total_amount)
VALUES
(1, 29.99),
(2, 19.99);

-- Inserting data into the order_items table
INSERT INTO order_items (order_id, product_id, status, quantity, price)
VALUES
(1, 1, 'shipped', 2, 59.98),
(2, 2, 'pending', 1, 19.99);
