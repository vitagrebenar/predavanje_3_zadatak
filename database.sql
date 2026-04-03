-- Kreiranje baze
CREATE DATABASE IF NOT EXISTS cjenik;
USE cjenik;

-- Tablica proizvoda
CREATE TABLE IF NOT EXISTS proizvodi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(50),
    naziv VARCHAR(255),
    opis TEXT,
    link TEXT,
    slika TEXT,
    brand VARCHAR(100),
    stanje VARCHAR(50),
    dostupno VARCHAR(50),
    cijena DECIMAL(10,2)
);
