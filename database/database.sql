CREATE DATABASE padaria;

USE padaria;

CREATE TABLE comprador(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    telefone BIGINT(11) NOT NULL,
    endereco VARCHAR(100) NOT NULL
);

CREATE TABLE produto(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    preco FLOAT NOT NULL
);

CREATE TABLE venda(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_comprador INT NOT NULL,
    data_venda TIMESTAMP NOT NULL,

    FOREIGN KEY (id_comprador) REFERENCES comprador(id)
);

CREATE TABLE itemVenda(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_venda INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,

    FOREIGN KEY (id_venda) REFERENCES venda(id),
    FOREIGN KEY (id_produto) REFERENCES produto(id)
);