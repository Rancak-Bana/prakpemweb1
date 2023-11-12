CREATE DATABASE pert7;
USE pert7;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(250) NOT NULL
);

INSERT INTO user VALUES
(1, 'andi', 'andi123'),
(2, 'bunga', 'bunga321');