<?php

class ProdutoController {
  public function listar() {
    echo "Estou no listar do ProdutoController";

    // abrir conexão com o banco de dados
    $parametros = "mysql:host=localhost;dbname=exemplo_mvc;charset=utf8mb4";
    $conn = new PDO($parametros, "root", "");

    // buscar os dados de produtos
    $sql = "SELECT * FROM produtos";
    $stm = $conn->prepare($sql);
    $stm->execute();

    // fechar conexão
    $conn = null;

    $resultado = $stm->fetchAll(PDO::FETCH_OBJ);

    // echo "<pre>";
    // var_dump($resultado);
    // echo "</pre>";

    // mostrar uma visão
    require_once "Views/lista-produtos.php";
  }
}

?>