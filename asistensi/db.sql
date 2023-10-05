DROP DATABASE IF EXISTS asistensi;
CREATE DATABASE asistensi;
USE asistensi;

CREATE TABLE makanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    makanan VARCHAR(255),
    harga INT
);

INSERT INTO makanan(makanan, harga) VALUES ('Nasi Goreng', 14000);