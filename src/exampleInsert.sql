-- Inserting data into the admins table
INSERT INTO admins (
    username, email, password, description, first_name, last_name,
    image_url, address, city, state, postal_code, country, phone_number, secret_code
) VALUES (
    'admin1', 'admin1@example.com', 'admin_password', 'System Administrator',
    'John', 'Doe', 'https://example.com/admin_image.jpg', '123 Admin St',
    'AdminCity', 'AdminState', '12345', 'AdminCountry', '+1234567890', 'admin_secret_code'
);

-- Inserting data into the users table
INSERT INTO users (
    email, password, first_name, last_name, address, city, state,
    postal_code, country, phone_number, secret_code
) VALUES (
    'user1@example.com', 'user_password', 'Jane', 'Doe', '456 User St',
    'UserCity', 'UserState', '54321', 'UserCountry', '+9876543210', 'user_secret_code'
);

-- Inserting data into the coupons
INSERT INTO coupons (coupon_code, coupon_type, discount_value, expiration_date) VALUES ('SAVE20', 'Percentage', 0.00, '2023-01-01');


-- Inserting data into the products table
INSERT INTO products (
    product_name, description, image_url, price, stock_quantity, category, admin_id,coupon_id
) VALUES (
    'Smartphone', 'High-end smartphone with advanced features',
    'https://example.com/smartphone_image.jpg', 599.99, 50, 'Electronics', 1,1
);

-- Inserting data into the orders table
INSERT INTO orders (user_id, total_amount) VALUES (1, 599.99);


-- Inserting data into the order_items table
INSERT INTO order_items (order_id, product_id, status, quantity, price) VALUES (1, 1, 'pending', 1, 599.99);


