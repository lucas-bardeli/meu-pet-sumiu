CREATE DATABASE IF NOT EXISTS meu_pet_sumiu;

USE meu_pet_sumiu;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
  id_usuario BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(15) NOT NULL
);

CREATE TABLE pets (
  id_pet BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255),
  idade INT,
  raca VARCHAR(255),
  porte ENUM('Pequeno', 'Médio', 'Grande'),
  local VARCHAR(255),
  data DATETIME,
  imagem VARCHAR(255),
  cor VARCHAR(255),
  cor_olhos VARCHAR(255),
  observacoes TEXT,
  situacao ENUM('Procurando pet', 'Procurando tutor', 'finalizado'),
  imagem VARCHAR(255),
  usuario_id BIGINT UNSIGNED,
);