<?php

abstract class Conexao {
  public function __construct(
    protected $db = null
  ) {
    $parametros = "mysql:host=localhost;dbname=meu_pet_sumiu;charset=utf8mb4";

    try {
      $this->db = new PDO($parametros, "root", "");
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      echo $e->getCode();
      die("Erro na conexão com o banco");
    }
  }
}

?>