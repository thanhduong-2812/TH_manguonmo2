CREATE DATABASE IF NOT EXISTS shop_db;
USE shop_db;

CREATE TABLE IF NOT EXISTS phones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    icon VARCHAR(10)
);

INSERT INTO phones (name, price, icon) VALUES 
('iPhone 15 Pro Max', 29990000, '📱'),
('Samsung S24 Ultra', 26490000, '📲'),
('Oppo Find X7 Ultra', 18500000, '🤳'),
('Xiaomi 14 Pro', 16200000, '🦾'),
('Google Pixel 8', 14800000, '📸');