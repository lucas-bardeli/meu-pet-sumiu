CREATE DATABASE meu_pet_sumiu;

USE meu_pet_sumiu;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  telefone VARCHAR(15) NOT NULL
);