<?php

class UsuarioDAO extends Conexao {
  public function __construct() {
    parent:: __construct();
  }

  public function inserir($usuario) {
    $sql = "INSERT INTO usuarios (nome,email,senha,telefone) VALUES (?,?,?,?)";

    try {
      // preparar a frase sql
      $smt = $this->db->prepare($sql);

      // substituir os pontos de interrogação pelos valores que estão no objeto $usuario
      $smt->bindValue(1, $usuario->getNome());
      $smt->bindValue(2, $usuario->getEmail());
      $smt->bindValue(3, $usuario->getSenha());
      $smt->bindValue(4, $usuario->getTelefone());

      $smt->execute();
      $this->db = null;
      return "Usuário inserido com sucesso!";
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      echo $e->getCode();
      die("Erro no cadastro do usuário.");
    }
  }

  public function login($usuario) {
    $sql = "SELECT id_usuario, email, senha, nome FROM usuarios WHERE email=?";

    try {
      $smt = $this->db->prepare($sql);
      $smt->bindValue(1, $usuario->getEmail());
      $smt->execute();
      $this->db = null;

      return $smt->fetchAll(PDO::FETCH_OBJ);
    }
    catch (PDOException $e) {
      $this->db = null;
      return "Erro ao validar email!";
    }
  }

  public function valida_email($usuario) {
    $sql = "SELECT email, nome, id_usuario FROM usuarios WHERE email=?";

    try {
      $smt = $this->db->prepare($sql);
      $smt->bindValue(1, $usuario->getEmail());
      $smt->execute();
      $this->db = null;

      return $smt->fetchAll(PDO::FETCH_OBJ);
    }
    catch (PDOException $e) {
      $this->db = null;
      return "Erro ao validar email!";
    }
  }
}

?>