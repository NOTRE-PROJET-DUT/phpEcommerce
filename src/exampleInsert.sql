-- Inserting data into admins table
INSERT INTO admins (username, email, password, first_name, last_name, secret_code)
VALUES ('admin1', 'admin1@example.com', 'hashed_password', 'Admin', 'One', 'secret123');

-- Inserting data into users table
INSERT INTO users (email, password, first_name, last_name, description, address, city, state, postal_code, country, phone_number, secret_code)
VALUES ('user1@example.com', 'hashed_password', 'John', 'Doe', 'A regular user', '123 Main St', 'Cityville', 'CA', '12345', 'USA', '123-456-7890', 'secret456');

-- Inserting data into products table
INSERT INTO products (product_name, description, image_url, price, stock_quantity, category, admin_id)
VALUES ('Product1', 'Description of Product1', 'url_to_image1.jpg', 29.99, 50, 'Electronics', 1);

-- Inserting data into orders table
INSERT INTO orders (user_id, total_amount)
VALUES (1, 29.99);

-- Inserting data into order_items table
INSERT INTO order_items (order_id, product_id, status, quantity, price)
VALUES (1, 1, 'pending', 1, 29.99);

