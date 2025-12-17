-- Tạo database nếu chưa có
CREATE DATABASE IF NOT EXISTS shop_db;
USE shop_db;

-- 1. Bảng sản phẩm cho Project 1 (Shop Hoa)
CREATE TABLE IF NOT EXISTS flowers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    icon VARCHAR(10)
);

INSERT INTO flowers (name, price, icon) VALUES 
('Hoa Hồng Đỏ', 500000, '🌹'),
('Hoa Hướng Dương', 350000, '🌻'),
('Hoa Tulip', 450000, '🌷'),
('Hoa Lan Hồ Điệp', 1200000, '🌸'),
('Cẩm Tú Cầu', 400000, '💠');

-- 2. Bảng sản phẩm cho Project 2 (Shop Điện thoại)
CREATE TABLE IF NOT EXISTS phones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    icon VARCHAR(10)
);

INSERT INTO phones (name, price, icon) VALUES 
('iPhone 15 Pro Max', 29990000, '📱'),
('Samsung S24 Ultra', 26490000, '📲'),
('Oppo Find X7', 18500000, '🤳'),
('Xiaomi 14 Pro', 16200000, '🦾'),
('Google Pixel 8', 14800000, '📸');