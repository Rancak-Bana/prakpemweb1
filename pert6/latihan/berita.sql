CREATE DATABASE berita;

USE berita;

CREATE TABLE posts (
    id int(11) NOT NULL AUTO_INCREMENT,
    judul TEXT,
    konten LONGTEXT,
    PRIMARY KEY (id)
);