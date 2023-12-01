-- Insert data into admins table
INSERT INTO admins (username, email, password) VALUES
    ('admin1', 'admin1@example.com', 'adminpassword1'),
    ('admin2', 'admin2@example.com', 'adminpassword2');

-- Insert data into users table
INSERT INTO users (email, password, checkpass) VALUES
    ('user1@example.com', 'userpassword1', 'usercheckpass1'),
    ('user2@example.com', 'userpassword2', 'usercheckpass2');

-- Insert data into products table
INSERT INTO products (product_name, description, image_url, price, stock_quantity, category, admin_id) VALUES
    ('Product 1', 'Description 1', 'image1.jpg', 49.99, 100, 'Electronics', 1),
    ('Product 2', 'Description 2', 'image2.jpg', 29.99, 50, 'Clothing', 2);

-- Insert data into orders table
INSERT INTO orders (user_id, total_amount) VALUES
    (1, 49.99),
    (2, 29.99);

-- Insert data into order_items table
INSERT INTO order_items (order_id, product_id, status, quantity, price) VALUES
    (1, 1, 'shipped', 2, 99.98),
    (2, 2, 'pending', 1, 29.99);
