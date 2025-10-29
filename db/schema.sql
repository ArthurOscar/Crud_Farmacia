CREATE DATABASE crud_farmacia;

USE crud_farmacia;

CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    CPF VARCHAR(11) NOT NULL,
    funcao ENUM('admin', 'funcionario')
);

CREATE TABLE remedios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    bula VARCHAR(300) NOT NULL,
    tipo VARCHAR(60) NOT NULL,
    codigo_remedio ENUM('A', 'B', 'C') NOT NULL
);