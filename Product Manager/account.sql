CREATE DATABASE IF NOT EXISTS product_manager;

USE product_manager;

CREATE TABLE IF NOT EXISTS user_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50),
    user_password VARCHAR(100),
    user_email VARCHAR(50),
    user_token VARCHAR(100)
);
