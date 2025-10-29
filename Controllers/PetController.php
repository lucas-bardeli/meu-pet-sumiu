<?php

if (!isset($_SESSION)) {
	session_start();
}

require_once "Models/Conexao.php";
require_once "Models/PetDAO.php";
require_once "Models/Pets.php";

class PetController {
  public function inserir() {
    $msg = array("","","","","","","");

    if($_POST) {
      // echo "<pre>";
      // var_dump($_FILES["imagem"]);
      // echo "</pre>";
      $erro = false;

      if ($_POST["porte"] == 0) {
        $msg[0] = "Preencha o porte do pet";
        $erro = true;
      }
      if (empty($_POST["local"])) {
        $msg[1] = "Preencha onde o pet foi encontrado ou perdido";
        $erro = true;
      }
      if (empty($_POST["data"])) {
        $msg[2] = "Preencha a data em que o pet foi encontrado ou perdido";
        $erro = true;
      }
      if (empty($_POST["cor"])) {
        $msg[3] = "Preencha as cores do pet";
        $erro = true;
      }
      if (empty($_POST["cor_olhos"])) {
        $msg[4] = "Preencha a cor dos olhos do pet";
        $erro = true;
      }
      if (!isset($_POST["situacao"])) {
        $msg[5] = "Informe a situação do pet";
        $erro = true;
      }
      if ($_FILES["imagem"]["name"] == "") {
        $msg[6] = "Selecione a imagem do pet";
        $erro = true;
      }
      else {
        if (
          $_FILES["imagem"]["type"] != "image/png" && 
          $_FILES["imagem"]["type"] != "image/jpg" && 
          $_FILES["imagem"]["type"] != "image/jpeg"
        ) {
          $msg[6] = "Tipo de imagem invalido";
          $erro = true;
        }
      }
      
      if (!$erro) {
        // inserir no BD - instanciar os objetos
        $usuario = new Usuarios($_SESSION["id"]);
        $pet = new Pets(
          0,$_POST["nome"],$_POST["idade"],$_POST["raca"],
          $_POST["porte"],$_POST["local"],$_POST["data"],
          $_FILES["imagem"]["name"],$_POST["cor"],$_POST["cor_olhos"],
          $_POST["observacoes"],$_POST["situacao"],$usuario
        );
        $petDAO = new petDAO();
        
        $petDAO->inserir($pet);

        // fazer upload da imagem
        // Verifica se a pasta existe
        if (!is_dir("assets/")) {
          // Cria a pasta com permissão 0755 (leitura e execução para todos, escrita só para o dono)
          mkdir("assets/", 0755, true);
        }
        $caminho = "assets/" . $_FILES["imagem"]["name"];
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho);

        header("location:index.php");
        die();
      }
      
    } // fim if post
    
    require_once "Views/form-pet.php";
  }

  public function alterar() {
  }
  public function mudar_situacao() {
  }
  public function listar() {
  }
}

?>