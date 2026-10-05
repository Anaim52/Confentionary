CREATE DATABASE confentionary;
USE confentionary;

CREATE TABLE customers(
customer_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255)
);

CREATE TABLE stuff(
stuff_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255)
);

CREATE TABLE cookers(
cooker_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255)
);

CREATE TABLE orders(
order_id INT AUTO_INCREMENT PRIMARY KEY,
order_name VARCHAR(255),
order_detail VARCHAR(255),
order_size INT,
order_price INT,
status VARCHAR(50)
);
