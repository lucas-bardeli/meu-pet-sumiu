<?php

if (!isset($_SESSION)) {
	session_start();
}

class PetController {
  public function inserir() {
    $msg = array("","","","","","","");

    if($_POST) {
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
      if ($_FILES["imagem"]["name"] == "") {
        $msg[5] = "Selecione a imagem do pet";
        $erro = true;
      }
      else {
        if (
          $_FILES["imagem"]["type"] != "image/png" && 
          $_FILES["imagem"]["type"] != "image/jpg" && 
          $_FILES["imagem"]["type"] != "image/jpeg"
        ) {
          $msg[5] = "Tipo de imagem invalido";
          $erro = true;
        }
      }
      
      if (!$erro) {
        //inserir no BD - instanciar os objetos
        
        $petDAO = new petDAO();
        
        $petDAO->inserir($pet);
        //fazer upload da imagem
        header("location:index.php");
        die();
      }
      
    }//fim if post
    
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