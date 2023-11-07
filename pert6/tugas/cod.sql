CREATE DATABASE cod;

USE cod;

CREATE TABLE barang (
    id varchar(20) NOT NULL,
    nama varchar(50),
    harga int,
    PRIMARY KEY (id)
);

CREATE TABLE pembeli (
    id varchar(20) NOT NULL,
    nama varchar(50),
    nohp varchar(20),
    alamat text,
    PRIMARY KEY (id)
);

CREATE TABLE kurir (
    id varchar(20) NOT NULL,
    nama varchar(50),
    nohp varchar(20),
    PRIMARY KEY (id)
);

INSERT INTO barang VALUES
('B001', 'Baju', 100000),
('B002', 'Celana', 150000),
('B003', 'Sepatu', 200000),
('B004', 'Tas', 250000),
('B005', 'Topi', 50000);

INSERT INTO pembeli VALUES
('P001', 'Jehian Athaya', '085155433460', 'Karanglewas, Banyumas, Jawa Tengah'),
('P002', 'Fikri Anggito', '08157950851', 'Baturraden, Banyumas, Jawa Tengah'),
('P003', 'M. Farhan', '088233224980', 'Kaliputih, Purwokerto, Jawa Tengah'),
('P004', 'Septian Rere', '081575697177', 'Bobosan, Purwokerto, Jawa Tengah'),
('P005', 'Billy Sukma', '081578072037', 'Sokanegara, Purwokerto, Jawa Tengah');

INSERT INTO kurir VALUES
('K001', 'Fajar - JNE', '081487243993'),
('K002', 'Fadil - SiCepat', '084914759184'),
('K003', 'Doni - AnterAja', '083582575772'),
('K004', 'Arif - Tiki', '085923757222'),
('K005', 'Riski - POS', '088471408915');